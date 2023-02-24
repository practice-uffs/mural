<div>
    @if ($show_create_panel && !$editing)
        @include('livewire.crud.change')
    @endif

    @if ($show_list)
        @if (count($items) > 0)
            <header class="section-header mt-8">
                <h2>Lista de registros existentes</h2>
            </header>
            <div class="mb-3">
                {{ $items->links() }}
            </div>
          
            @if($show_input)
              <div class=" p-3 d-flex justify-content-between ">
                        <div class="input-group">
                            <div class="d-flex">
                                    <div class="d-flex dropdown">
                                        <button type="button" class="col btn btn-primary dropdown-toggle me-3 rounded" data-bs-toggle="dropdown" >
                                            Usuário(a)
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item btn btn-outline btn-primary py-0" wire:click="userType($v = null)">Todos</li>
                                            <li class="dropdown-item btn btn-outline btn-primary py-0" wire:click="userType('admin')">admin</li>
                                            <li class="dropdown-item btn btn-outline btn-primary py-0" wire:click="userType('normal')">normal</li>
                                            
                                        </ul>
                                    </div>
                                    
                                    <div class=" position-relative">
                                        
                                        <input type="text" class="form-control form-control-lg rounded"  placeholder="Nome..." wire:click="userType($v = null)" wire:model="search">
                                        <span class="input-group-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="50" fill="currentColor" class="bi bi-search  position-absolute  top-0 end-0 pe-2" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1                                       11 0z"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div> 
                            </div>
                        
                        <div>
                            <a href="{{route('admin.userDownload')}}" class="btn btn-sm btn-outline btn-primary py-0 float-right">Baixar E-mails</a>
                        </div>
                </div>   
            
                
            @endif
           
            <!--<a href="{{route('admin.userDownload')}}" class="btn btn-sm btn-outline btn-primary py-0 float-right">Baixar E-mails</a> -->

            <table class="table  w-full flex flex-row flex-no-wrap overflow-hidden my-4">
                <thead>
                    <tr class="flex flex-col flex-no wrap sm:table-row sm:rounded-none mb-2 sm:mb-0">
                        @foreach ($fields as $key => $field)
                            @if (isset($field['show']) && !Str::contains($field['show'], 'list'))
                                @continue
                            @endif
                            <th>{{ $field['label'] }}</th>
                        @endforeach
                            
                        <th></th>
                    </tr>
                </thead>

                <tbody class="flex-1 sm:flex-none">
                    @foreach ($items as $item)
                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                            @foreach ($fields as $key => $field)
                                @if (isset($field['show']) && !Str::contains($field['show'], 'list'))
                                    @continue
                                @endif
                                <td>
                                    @switch(@$field['type'])
                                        @case('boolean')
                                            <div
                                                class="badge @if ($item[$field['property']]) badge-success @else badge-warning @endif text-xs">
                                                @if (isset($field['value_as_text']))
                                                    @if ($item[$field['property']])
                                                        {{ $field['value_as_text'][1] }}
                                                    @else
                                                        {{ $field['value_as_text'][0] }}
                                                    @endif
                                                @else
                                                    {{ $item[$field['property']] ? 'Sim' : 'Não' }}
                                                @endif
                                            </div>
                                        @break

                                        @case('select')
                                        @case('radio')
                                            <!-- {{ $value = $item[$field['property']] }} -->
                                            {{ @collect($field['options'])->first(function ($val) use ($value) {return $val['id'] == $value;})['text'] }}
                                        @break

                                        @default
                                            {{ $item[$field['property']] }}
                                    @endswitch
                                </td>
                            @endforeach
                            <td class="text-right">
                                <button wire:click="edit({{ $item->id }})"
                                    class="btn btn-sm btn-outline btn-primary py-0">Editar</button>
                            </td>
                        </tr>
                        @if ($editing == $item->id)
                            <tr>
                                <td class="mwpx" colspan="{{ count($fields) + 2 }}">@include(
                                    'livewire.crud.change'
                                )</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <div>
                {!! $items->links() !!}
            </div>
    
        @else
           <div class=" p-3 d-flex justify-content-between ">
                        <div class="input-group">
                            <div class="d-flex">
                                    <div class="d-flex dropdown">
                                        <button type="button" class="col btn btn-primary dropdown-toggle me-3 rounded" data-bs-toggle="dropdown" >
                                            Usuário(a)
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item btn btn-outline btn-primary py-0" wire:click="userType($v = null)">Todos</li>
                                            <li class="dropdown-item btn btn-outline btn-primary py-0" wire:click="userType('admin')">admin</li>
                                            <li class="dropdown-item btn btn-outline btn-primary py-0" wire:click="userType('normal')">normal</li>
                                            
                                        </ul>
                                    </div>
                                    
                                    <div class=" position-relative">
                                        
                                        <input type="text" class="form-control form-control-lg rounded"  placeholder="Nome..." wire:click="userType($v = null)" wire:model="search">
                                        <span class="input-group-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="50" fill="currentColor" class="bi bi-search  position-absolute  top-0 end-0 pe-2" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1                                       11 0z"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div> 
                            </div>
                        
                        <div>
                            <a href="{{route('admin.userDownload')}}" class="btn btn-sm btn-outline btn-primary py-0 float-right">Baixar E-mails</a>
                        </div>
                </div> 
            <table class="table  w-full flex flex-row flex-no-wrap overflow-hidden my-4">
                <thead>
                        <tr class="flex flex-col flex-no wrap sm:table-row sm:rounded-none mb-2 sm:mb-0">
                            @foreach ($fields as $key => $field)
                                @if (isset($field['show']) && !Str::contains($field['show'], 'list'))
                                    @continue
                                @endif
                                <th>{{ $field['label'] }}</th>
                            @endforeach
                                
                            <th></th>
                        </tr>
                    </thead>
            </table>
            <tr>
              <td colspan="6">Nenhum pedido encontrado com os filtros aplicados.</td>
            </tr><br><br>
            <hr/> 
            <!--<section class="text-gray-600">
                <div class="px-5 py-14 mx-auto">
                    <div class="flex items-center lg:w-3/5 mx-auto pb-10 mb-10 sm:flex-row flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full text-indigo-200 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-grow sm:text-left mt-6 sm:mt-0">
                            <h2 class="text-gray-900 text-lg title-font font-semibold mb-2">Nada por aqui ainda</h2>
                            <p class="leading-relaxed text-base">Nenhum registro desse tipo foi cadastrado até o
                                momento. Utilize o formulário acima para criar o primeiro registro.</p>
                        </div>
                    </div>
                </div>
            </section> -->
        @endif
    @endif
</div>
@section('styles')
    <style>
        .mwpx {
            max-width: 300px;
        }

    </style>
@endsection
