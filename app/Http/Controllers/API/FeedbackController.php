<?php

namespace App\Http\Controllers\API;

use App\Model\Feedback;
use Orion\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    protected $model = Feedback::class;
}
