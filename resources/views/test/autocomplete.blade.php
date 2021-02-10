@extends('layouts.main')

@section('content')

<div class="row section">
    <div class="col-lg-12">

        <input type="text" id="autocomplete">
        <input type="text" id="userinput" placeholder="Search by movie title ...">

        <div id="suggestions"></div>
    </div>
</div>

@endsection