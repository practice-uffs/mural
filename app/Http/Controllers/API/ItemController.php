<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

use App\Item;
use App\User;
use App\Channels;
use App\Specification;
use stdClass;
use App\Mail\Email;

use Carbon\Carbon;
use App\Http\Resources\ItemResource;
use App\Http\Resources\CommentResource;
use App\Notifications\PushNotification;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::whereNull('parent_id');

        return ItemResource::collection($items -> paginate(10000));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => $request -> user_id,
            'location_id' => $request -> location_id,
            'category_id' => $request -> category_id,
            'status' => Item::STATUS_WAITING,
            'type' => $request -> type,
            'title' => $request -> title,
            'description' => $request -> description,
            'github_issue_link' => $request -> github_issue_link,
            'hidden' => $request -> hidden,
        ];

        if ($data['type'] == Item::TYPE_SERVICE) {
            $specification = Specification::create([
                'content' => $request -> content
            ]);

            $data['specification_id'] = $specification -> id;
        }

        $item = Item::create($data);

        return response(
            new ItemResource($item),
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(
            new ItemResource(Item::find($id)),
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        $item -> update([
            'location_id' => $request -> location_id,
            'category_id' => $request -> category_id,
            'status' => Item::STATUS_WAITING,
            'type' => Item::TYPE_IDEA,
            'title' => $request -> title,
            'description' => $request -> description,
            'github_issue_link' => $request -> github_issue_link,
            'hidden' => $request -> hidden == 'on',
        ]);

        return response(
            new ItemResource($item),
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);

        return response(
            null,
            Response::HTTP_NO_CONTENT
        );
    }

    /**
     * Returns all comments assossiated with an item.
     * @param  int $parentId
     * @return [type]     [description]
     */
    public function listComments($parentId)
    {
        $comments = Item::where('parent_id', $parentId);

        return CommentResource::collection($comments -> paginate(10000));
    }

    /**
     * Store a newly created comment.
     * @param  \Illuminate\Http\Request $request
     * @param  int $parentId
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request, $parentId){

        $POST_GIT = false;

        $item = Item::find($parentId);
        if($item->github_issue_link && $POST_GIT){
            $repo = getenv("GIT_REPO");
            $issue = explode('/',$item->github_issue_link);
            $issue = end($issue);

            $response = Http::withToken(getenv("GIT_TOKEN"))
                ->post("{$repo}/issues/{$issue}/comments", [
                    'body' => $request->text
                ]);
        } else{
                $request->text = str_replace("#cliente","",$request->text);
                $comment = Item::create([
                    'user_id' => $request->user_id,
                    'parent_id' => $parentId,
                    'type' => Item::TYPE_COMMENT,
                    'title' => User::find($request->user_id)->name,
                    'description' => $request->text,
                    'hidden' => false,
                ]);
        }
        $item->touch();

        if($item->type==Item::TYPE_SERVICE && $item->user_id != $request->user_id){
            $user = User::find($item->user_id);

            try{
                //Envio de push notification
                $request_user = User::find($comment->user_id);
                $request_user = ucwords(strtolower($request_user->name));
                $user->notify(new PushNotification("Novo comentário em ".$item->title, $request_user.":\n\"".trim($comment->description)."\""));
            } catch (\Throwable $th) {
                //throw $th;
            }

            try {
                //Envio de Email
                $email = new stdClass();
                $email->content = 'emails.NovoComentario';
                $email->subject = 'Novo comentário na solicitação';
                $mail = new Email($user,$email,$item);
                $mail->build();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        return response(
            Response::HTTP_CREATED
        );
    }

    public function destroyComment($parentId, $commentId)
    {
        $comment = Item::find($commentId);
        $comment->delete();

        return response(
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
