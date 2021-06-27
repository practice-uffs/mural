<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Show available services.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('services');
    }
}
