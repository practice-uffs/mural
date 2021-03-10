@extends('layouts.base')
@section('content')
<section class="my-5 container">
    <feedback-page :user="{{Auth()->user()}}" :token="{{$token}}"></feedback-page>
</section>
@endsection

