<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    function index(){
        return view('pages/feedbacks');
    }
}
