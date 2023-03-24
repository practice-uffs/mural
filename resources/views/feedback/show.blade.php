@extends('layouts.base')
@section('content')
<section>
    <div class="container">
        <header class="section-header">
            <h2>Feedbacks</h2>
            <p>Informações de feedbacks</p>
        </header>
        <div class="row items-center">
            <div class="col-lg-12 col-md-12"> 
                <!-- passa o id para realizar a consulta -->
                @livewire('feedback.show',['idFeedback'=>$id])
            </div>
        </div>
    </div>
</section>
@endsection