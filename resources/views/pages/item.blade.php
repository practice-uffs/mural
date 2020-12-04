@extends('layouts.base')
@section('content')
<section class="my-5 container">
<item-page :user="{{Auth()->user()}}" :item="{{$item}}" ></item-page>
</section>
@endsection