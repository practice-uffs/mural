@extends('layouts.base')
@section('content')
<section class="my-5 container">
    <servicos-acompanhar-page :user="{{Auth()->user()}}" :token="{{$token}}"></servicos-acompanhar-page>
</section>
@endsection

