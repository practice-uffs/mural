<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class FeedbacksController extends Controller
{
    /**
     * Show the dashboard of feedbacks.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.feedbacks');
    }

    public function show(int $id)
    {
        return view('feedback.show', 
            ['id' => $id]
        );
    }    
}
