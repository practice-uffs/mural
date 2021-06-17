<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.location');
    }
}
