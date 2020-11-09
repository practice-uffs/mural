@extends('layouts.base')
@section('content')
<section class="my-5 container">
    <services-page :user="{{Auth()->user()}}"></services-page>
</section>
@endsection

