<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Item;
use App\User;
use App\Specification;

use App\Http\Resources\ItemResource;
use App\Http\Resources\CommentResource;

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

        return ItemResource::collection($items -> paginate());
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

        return CommentResource::collection($comments -> paginate());
    }

    /**
     * Store a newly created comment.
     * @param  \Illuminate\Http\Request $request
     * @param  int $parentId
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request, $parentId)
    {
        $comment = Item::create([
            'user_id' => $request -> user_id,
            'parent_id' => $parentId,
            'type' => Item::TYPE_COMMENT,
            'title' => User::find($request -> user_id) -> name,
            'description' => $request -> text,
            'hidden' => false,
        ]);

        return response(
            new CommentResource($comment),
            Response::HTTP_CREATED
        );
    }
}
