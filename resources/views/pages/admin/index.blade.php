@extends('layouts.base')
@section('content')
<section class="my-5 container">
    <admin-page :user="{{Auth()->user()}}" :token="{{$token}}" ></admin-page>
</section>
@endsection
