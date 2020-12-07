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
use App\Http\Resources\ServiceResource;

class GithubWebhookController extends Controller
{
    function issueComment(Request $request){
        $service = Item::where('github_issue_link', $request->issue['html_url'])->first();

        // CRIADO UM COMENTÁRIO
        if($request['action'] == 'created'){
            $comment = Item::create([
                'user_id' => $service -> user_id,
                'parent_id' => $service -> id,
                'type' => Item::TYPE_COMMENT,
                'title' => $request->issue['user']['login'],
                'description' => $request->comment['body'],
                'hidden' => false,
                'github_issue_link' => $request->comment['id'],
            ]);
    
            return response(
                new CommentResource($comment),
                Response::HTTP_CREATED
            );
        }  
        
        // EDITANDO UM COMENTÁRIO
        if($request['action'] == 'edited'){
            $comment =  Item::where('github_issue_link', $request->comment['id'],)
                            ->first();
            $comment->description = $request->comment['body'];
            $comment->save();
        }

        // DELETANDO UM COMENTÁRIO
        if($request['action'] == 'deleted'){
            $comment =  Item::where('github_issue_link', $request->comment['id'],)
                            ->first();
            $comment->description = $request->comment['body'];
            $comment->delete();
        }
    }

}
