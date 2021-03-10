<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function solicitar(){
        return view('pages/servicos-solicitar')->with('token',Session::get('token'));
    }
    function acompanhar(){
        return view('pages/servicos-acompanhar')->with('token',Session::get('token'));
    }
}
