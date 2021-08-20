<div>
    @if ($show_create_panel && !$editing)
        @include('livewire.crud.change')
    @endif

    @if ($show_list)
        @if(count($items) > 0)
            <header class="section-header  mt-8">
                <h2>Lista de registros existentes</h2>
            </header>

            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        @foreach ($fields as $key => $field)
                            @if (isset($field['show']) && !Str::contains($field['show'], 'list'))
                                @continue
                            @endif
                            <th>{{ $field['label'] }}</th>
                        @endforeach
                        <th></th>
                    </tr>
                </thead>

                @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        @foreach ($fields as $key => $field)
                            @if (isset($field['show']) && !Str::contains($field['show'], 'list'))
                                @continue
                            @endif
                            <td>
                                @switch(@$field['type'])
                                @case('boolean')
                                    <div class="badge @if ($item[$field['property']]) badge-success @else badge-warning @endif text-xs">
                                        @if (isset($field['value_as_text']))
                                            @if ($item[$field['property']]) {{ $field['value_as_text'][1] }} @else {{ $field['value_as_text'][0] }} @endif
                                        @else
                                            {{ $item[$field['property']] ? 'Sim' : 'Não' }}
                                        @endif
                                    </div>
                                    @break
                                @case('select')
                                @case('radio')
                                    <!-- {{ $value = $item[$field['property']]; }} -->
                                    {{ @collect($field['options'])->first(function($val) use ($value) { return $val['id'] == $value; })['text'] }}
                                    @break
                                @default
                                    {{ $item[$field['property']] }}
                                @endswitch
                            </td>
                        @endforeach
                        <td class="text-right">
                            <button wire:click="edit({{$item->id}})" class="btn btn-sm btn-outline btn-primary py-0">Editar</button> | 
                            <button wire:click="destroy({{$item->id}})" class="btn btn-sm btn-outline py-0">Apagar</button>
                        </td>
                    </tr>
                    @if ($editing == $item->id)
                        <tr><td colspan="{{ count($fields) + 2 }}">@include('livewire.crud.change')</td></tr>
                    @endif
                @endforeach
            </table>
        @else
            <section class="text-gray-600">
                <div class="px-5 py-14 mx-auto">
                    <div class="flex items-center lg:w-3/5 mx-auto pb-10 mb-10 sm:flex-row flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full text-indigo-200 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-grow sm:text-left mt-6 sm:mt-0">
                            <h2 class="text-gray-900 text-lg title-font font-semibold mb-2">Nada por aqui ainda</h2>
                            <p class="leading-relaxed text-base">Nenhum registro desse tipo foi cadastrado até o momento. Utilize o formulário acima para criar o primeiro registro.</p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
</div> 