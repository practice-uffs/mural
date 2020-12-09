<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function index(){
        return view('pages/services')->with('token',Session::get('token'));
    }
}
