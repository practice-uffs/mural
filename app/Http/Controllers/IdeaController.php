<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Show the idea page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('ideas');
    }
}
