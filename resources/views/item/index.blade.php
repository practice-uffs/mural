@extends('layouts.app')

@include('layouts.header', ['home' => true])

@section('content')

    <item-wrapper auth-user-id={{$user -> id ?? ''}}></item-wrapper>

@endsection

