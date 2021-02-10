@extends('layouts.base')
@section('content')
<section class="my-5 container">
    <servicos-solicitar-page :user="{{Auth()->user()}}" :token="{{$token}}"></servicos-solicitar-page>
</section>
@endsection

