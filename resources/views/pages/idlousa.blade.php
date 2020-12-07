@extends('layouts.lousa')
@section('content')
<section>
    <idlousa-page :user="{{Auth()->user()}}"></idlousa-page>
</section>
@endsection

<style scoped>
  section {
    width: 99.3%;
    height: 86%;
  }
</style>
