<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('pages/admin/index')->with('token',Session::get('token'));
    }
}
