@extends('layouts.lousa')
@section('content')
<section>
    <lousa-page :user="{{Auth()->user()}}"></lousa-page>
</section>
@endsection

<style scoped>
  section {
    width: 99.3%;
    height: 86%;
  }
</style>
