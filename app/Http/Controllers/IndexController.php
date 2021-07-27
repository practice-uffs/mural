<?php

namespace App\Http\Controllers;

use App\Model\Category;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', [
            'categories' => Category::all()
        ]);
    }
}
