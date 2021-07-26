<?php

namespace App\Http\Controllers\API;

use App\Model\Comment;
use Orion\Http\Controllers\Controller;

class CommentController extends Controller
{
    protected $model = Comment::class;
}
