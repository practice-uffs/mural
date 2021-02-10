@extends('layouts.base')
@section('content')
<section class="my-5 container">
    <services-page :user="{{Auth()->user()}}" :token="{{$token}}"></services-page>
</section>
@endsection

