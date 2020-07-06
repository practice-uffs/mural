@extends('layouts.main')

@section('headsup')

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Atenção</h4>
            <p>Esse horário é preliminar. Ele foi decidido e homologado pelo Colegiado do Curso, então há baixas chances que ele seja alterado. Entretanto, ele pode sofrer alterações conforme demandas da Coordenação Acadêmica em virtude de alocações fora do controle da Coordenação do Curso.</p>
            <hr>
            <p class="mb-0">Dúvidas? Escreva para <a href="mailto:computacao.ch@uffs.edu.br">computacao.ch@uffs.edu.br</a></p>
        </div>
    </div>
</div>

@endsection

@section('content')

@if(session()->get('success'))
    <div class="row section">
        <div class="col-12">
            <div class="alert alert-success">
                {{ session()->get('success') }}  
            </div>
        </div>
    </div>
@endif

<div class="row section">
    <div class="col-lg-12">
        <div class="card text-white bg-dark border-secondary">
            <div class="card-header">
                Informações
            </div>
            <div class="card-body">
                <p class="text-muted">Boas-vindas ao centro de gerência de TCCs do curso de <a href="https://cc.uffs.edu.br" target="_blank">Ciência da Computação</a>. Utilize a lista abaixo para acompanhar os trabalhos nos quais você tem algum envolvimento. Se você for estudante, fale primeiramente com seu orientador(a) para tratar de questões do seu TCC. </p>

                <p class="text-muted">
                    - Responsável pelo TCC I: <a href="mailo:fernando.bevilacqua@uffs.edu.br">fernando.bevilacqua@uffs.edu.br</a>
                </p>
                <p class="text-muted">
                    - Responsável pelo TCC II: <a href="mailo:raquel.pegoraro@uffs.edu.br">raquel.pegoraro@uffs.edu.br</a>
                </p>
            </div>
        </div>
    </div>
</div>

@if ($showCreateProject)
    <div class="row section">
        <div class="col-12">
            <div class="alert alert-dark" role="alert">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p><strong>Vamos começar?</strong></p>
                        <p class="text-muted">Você ainda não iniciou o acompanhamento do seu TCC. Clique no botão ao lado para iniciar o processo. Você não precisa ter um orientador ou um tema agora, isso pode ser definido depois. Se você já tem essas informações, pode informá-las a seguir.</p>
                    </div>
                    <div class="col-3 text-center">
                        <a href="{{ route('project.create') }}"><button type="button" class="btn btn-outline-success btn-lg" href="google.com">Iniciar um TCC</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>        
@endif

@if (count($projects) != 0)
    <h2><ion-icon name="folder-open-outline"></ion-icon> Meus projetos</h2>
    <div class="row section">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Autoria</th>
                    <th scope="col">Orientação</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Período</th>
                    <th scope="col">Situação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr onclick="window.location = '{{ route('project.show', [$project]) }}'" style="cursor:pointer;">
                            <td>{{ $project->id }}</td>
                            <td>Fernando Bevilacqua</td>
                            <td>Fernando Bevilacqua</td>
                            <td>{{ $project->type }}</td>
                            <td>20xx</td>
                            <td>
                                {{ $project->status }}
                                
                                <a href="{{ route('project.edit', $project->id)}}" class="btn btn-primary">Edit</a>
                                
                                <form action="{{ route('project.remove', $project->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif

@endsection