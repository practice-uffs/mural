@extends('layouts.app', ["page_name" => "Home"])

@section('header')
<header>
    <nav class="nav-extended">
        <div class="nav-wrapper grey lighten-5">
            <a href="#" class="brand-logo">
                <img src="{{ asset('img/logo-practice.png') }}" class="nav__img">
            </a>
            <ul id="nav-mobile" class="right">

            </ul>
        </div>

        <div class="nav-content grey lighten-2">

        </div>
    </nav>
</header>
@endsection

@section('content')
    <h2> Miaaaau </h2>
@endsection