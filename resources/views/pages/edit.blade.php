@extends('layouts.base')
@section('content')
<section class="my-5 container">
<edit-page :user="{{Auth()->user()}}" :item="{{$item}}"  :token="{{$token}}"></edit-page>
</section>
@endsection