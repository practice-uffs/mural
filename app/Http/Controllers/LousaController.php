<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class LousaController extends Controller
{
    function index(){
        return view('pages/lousas')->with('token',Session::get('token'));
    }
}
