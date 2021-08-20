<div>
    <!-- filters -->
    <div class="row">
        <!-- category -->
        <div class="col-3">
            <label class="label">
                <span class="label-text">Categoria</span> 
                <a href="#" class="label-text-alt"></a>
            </label> 
            <select wire:model="filter.category_id" class="select select-bordered w-full">
                <option value="">-- Todas --</option> 
                @foreach ($categories as $category)
                    <option value="{{ $category['id']}}">{{ $category['name'] }}</option> 
                @endforeach
            </select> 
            <label class="label">
                <a href="#" class="label-text-alt"></a> 
            </label>
        </div>

        <!-- service -->
        <div class="col-4">
            <label class="label">
                <span class="label-text">Serviço</span> 
                <a href="#" class="label-text-alt"></a>
            </label> 
            <select wire:model="filter.service_id" class="select select-bordered w-full">
                <option value=""> -- Todos --</option> 
                @foreach ($services as $service)
                    <option value="{{ $service['id']}}">@if ($service['category'] != null) {{ $service['category']['name'] }} |@endif {{ $service['name'] }}</option> 
                @endforeach
            </select> 
            <label class="label">
                <a href="#" class="label-text-alt"></a> 
            </label>
        </div>

        <!-- location -->
        <div class="col-2">
            <label class="label">
                <span class="label-text">Local</span> 
                <a href="#" class="label-text-alt"></a>
            </label> 
            <select wire:model="filter.location_id" class="select select-bordered w-full">
                <option value=""> -- Todos --</option> 
                @foreach ($locations as $location)
                    <option value="{{ $location['id']}}">{{ $location['name'] }}</option> 
                @endforeach
            </select> 
            <label class="label">
                <a href="#" class="label-text-alt"></a> 
            </label>
        </div>
        
        <!-- status -->
        <div class="col-3">
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
    </div>

    <!-- list of elements -->
    <div class="row">
        <div class="col-12">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Título</th>
                        <th>Local</th>
                        <th>Datas</th>
                        <th>Comentários</th>
                        <th>Situação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <th>
                                <a href="{{ route('order.show', [$order['id']]) }}" class="btn btn-primary">Ver</a>
                            </th>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div>
                                        <div class="font-bold">{{ $order['title'] }}</div>
                                        <div class="text-sm opacity-50">{{ @$order['service']['category']['name'] }} > {{ $order['service']['name'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $order['location']['slug'] }}
                            </td>
                            <td>
                                <div>{{ $order['created_at'] }} (criação)</div>
                                <div class="text-sm opacity-50">{{ $order['created_at'] }} (última atualização)</div>
                            </td>
                            <td>
                                {{ count($order['comments']) }}
                                @if (count($order['comments']) > 0)
                                    <div class="text-sm opacity-50 ml-1">
                                        Último:
                                        {{ $order['comments'][count($order['comments']) - 1]['user']['name'] }}
                                        <br />
                                        {{ $order['comments'][count($order['comments']) - 1]['created_at'] }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span class="badge badge-outline badge-success badge-md">{{ $order['status'] }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6">Nenhum pedido encontrado com os filtros aplicados.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


