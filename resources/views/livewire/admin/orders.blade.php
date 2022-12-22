<div>
    <!-- filters -->
    <div class="row">
        <!-- category -->
        <div class="col-6">
            <label class="label">
                <span class="label-text">Categoria</span>
                <a href="#" class="label-text-alt"></a>
            </label>
            <select wire:model="filter.category_id" class="select select-bordered w-full">
                <option value="">-- Todas --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
            <label class="label">
                <a href="#" class="label-text-alt"></a>
            </label>
        </div>

        <!-- service -->
        <div class="col-6">
            <label class="label">
                <span class="label-text">Serviço</span>
                <a href="#" class="label-text-alt"></a>
            </label>
            <select wire:model="filter.service_id" class="select select-bordered w-full">
                <option value=""> -- Todos --</option>
                @foreach ($services as $service)
                    <option value="{{ $service['id'] }}">
                        @if ($service['category'] != null)
                            {{ @$service['category']['name'] }} |
                        @endif {{ @$service['name'] }}
                    </option>
                @endforeach
            </select>
            <label class="label">
                <a href="#" class="label-text-alt"></a>
            </label>
        </div>

        <!-- location -->
        <div class="col-6">
            <label class="label">
                <span class="label-text">Local</span>
                <a href="#" class="label-text-alt"></a>
            </label>
            <select wire:model="filter.location_id" class="select select-bordered w-full">
                <option value=""> -- Todos --</option>
                @foreach ($locations as $location)
                    <option value="{{ $location['id'] }}">{{ $location['name'] }}</option>
                @endforeach
            </select>
            <label class="label">
                <a href="#" class="label-text-alt"></a>
            </label>
        </div>

        <!-- status -->
        <div class="col-6">
            <label class="label">
                <span class="label-text">Status do pedido</span>
                <a href="#" class="label-text-alt"></a>
            </label>
            <select wire:model="filter.status" class="select select-bordered w-full">
                @foreach ($statuses as $value => $name)
                    <option value="{{ $value }}">{{ $name }}</option>
                @endforeach
            </select>
            <label class="label">
                <a href="#" class="label-text-alt"></a>
            </label>
        </div>
        
        <!-- altera filtro de ordem cronológica.-->
        <div class="col-6">
            <label class="label">
                <span class="label-text">Alterar ordem cronológica</span>
                <a href="#" class="label-text-alt"></a>
            </label>
            <select wire:model="filter.sortDate" class="select select-bordered w-full">
                @foreach ($sort_by_date as $option => $text)
                    <option value="{{ $option }}">{{ $text }}</option>
                @endforeach
            </select>
            <label class="label">
                <a href="#" class="label-text-alt"></a>
            </label>
        </div>
    </div>
   

    <!-- list of elements -->
    <div class="row mt-4">
        <div class="col-12">{!! $orders->links() !!}</div>
    </div>


    <div class="row col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Título</th>
                        <th scope="col">
                            <div class="text-center">Local</div>
                        </th>
                        <th scope="col">
                            <div class="text-center">Datas</div>
                        </th>
                        <th scope="col">
                            <div class="text-center">Comentários</div>
                        </th>
                        <th scope="col">
                            <div class="text-center">Situação</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td scope="row">
                                <a href="{{ route('order.show', [$order['id']]) }}" class="btn btn-primary">Ver</a>
                            </td>
                            <td class="text-wrap">
                                <div class="flex items-center space-x-3">
                                    <div>
                                        <div class="font-bold">{{ $order['title'] }}</div>
                                        <div class="text-sm opacity-50">{{ @$order['service']['category']['name'] }}
                                            > {{ @$order['service']['name'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-align-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 inline-block"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ @$order['location']['slug'] }}

                            </td>
                            <td>
                                <div class="d-flex flex-column align-items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-gray-300 float-left mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $order['created_at_human'] }}
                                    </div>
                                    <div>
                                        <span class="text-sm opacity-50"> (atualizado
                                            {{ $order['created_at_human'] }})</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column align-items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-gray-300 float-left mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                        {{ count($order['comments']) }}
                                    </div>
                                    @if (count($order['comments']) > 0)
                                        <div class="text-sm opacity-50 ml-1">Último comentário
                                            {{ @$order['comments'][count(@$order['comments']) - 1]['created_at_human'] }}
                                            <br /> Por:
                                            {!! Str::title(@$order['comments'][count(@$order['comments']) - 1]['user']['name']) !!}
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <span
                                        class="badge badge-outline badge-info badge-md">{{ $order->situation()->text }}</span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Nenhum pedido encontrado com os filtros aplicados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">{!! $orders->links() !!}</div>
    </div>
</div>
