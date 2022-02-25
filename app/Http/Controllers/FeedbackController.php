<?php

namespace App\Http\Controllers;

class FeedbackController extends Controller
{
    /**
     * Show the feedback page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('feedbacks');
    }
}
