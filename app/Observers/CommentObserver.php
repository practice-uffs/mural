<?php

namespace App\Observers;

use App\Events\OrderCommented;
use App\Models\Comment;

class CommentObserver
{
    /**
     * Listen to the Comment created event.
     *
     * @param  \App\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        OrderCommented::dispatch($comment->commentable, $comment);
    }

}