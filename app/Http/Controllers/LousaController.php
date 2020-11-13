<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LousaController extends Controller
{
    function index(){
        return view('pages/lousas');
    }
}
