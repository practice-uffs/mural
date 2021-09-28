<?php

namespace App\Http\Controllers\API;

use App\Models\Feedback;
use Orion\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    protected $model = Feedback::class;
}
