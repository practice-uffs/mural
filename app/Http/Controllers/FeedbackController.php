<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    function index(){
        return view('pages/feedbacks')->with('token',Session::get('token'));
    }
}
