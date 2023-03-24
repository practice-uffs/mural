@extends('layouts.base')
@section('content')
<section>
    <div class="container mt-10">
        <header class="section-header mt-10">
            <h2>Feedbacks de usuários</h2>
            <p>Visualização de feedbacks</p>
        </header>
        @livewire('admin.feedbacks')
    </div>
</section>
@endsection