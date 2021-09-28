<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use Orion\Http\Controllers\Controller;

class CommentController extends Controller
{
    protected $model = Comment::class;
}
