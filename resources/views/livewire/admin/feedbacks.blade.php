<!-- list of elements -->
<div class="row mt-4">
    <div class="col-12">{!! $feedbacks->links() !!}</div>
</div>
<div class="row col-12">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Comentário</th>
                    <th scope="col">
                        <div class="text-center">Data</div>
                    </th>
                    <th scope="col">
                        <div class="text-center">Criador</div>
                    </th>
                    <th scope="col">
                        <div class="text-center">Tipo</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($feedbacks as $feedback)
                    <tr>
                        <td scope="row">
                            <a href="{{ route('feedback.show', [$feedback['id']]) }}" class="btn btn-primary">Ver</a>
                        </td>
                        <td class="text-wrap">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <!--Defini um tamanho maximo de 50 chars-->
                                    <div class="font-bold">
                                        @if(strlen($feedback['comment'])>50) 
                                            {{substr($feedback['comment'],0,47).' ...'}}
                                        @else
                                            {{$feedback['comment']}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="w-max d-flex flex-column align-items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-gray-300 float-left mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $feedback['created_at_human'] }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column align-items-center">
                                {!! Str::title(@$feedback['user']['name']) !!}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="badge badge-outline badge-info badge-md"> 
                                    @switch ($feedback['type']) 
                                        @case('critic')
                                            Crítica
                                            @break;
                                        @case("comment")
                                            Comentário
                                            @break;
                                        @case("compliment")
                                            Elogio
                                            @break;
                                        @case("suggestion")
                                            Sugestão
                                           @break;
                                    @endswitch
                                </span>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nenhum feedback encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">{!! $feedbacks->links() !!}</div>
</div>