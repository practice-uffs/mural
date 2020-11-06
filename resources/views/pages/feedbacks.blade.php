@extends('layouts.base')
@section('content')
<section class="my-5 container">
    <feedback-page :user="{{Auth()->user()}}"></feedback-page>
</section>
@endsection

