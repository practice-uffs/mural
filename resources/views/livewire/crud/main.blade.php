<div>
    @if ($show_create_panel)
        @include('livewire.crud.change', ['create' => true])
    @endif

    @if ($show_list)
        <table class="table w-full mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    @foreach ($fields as $key => $field)
                        <th>{{ $field['label'] }}</th>
                    @endforeach
                    <th></th>
                </tr>
            </thead>

            @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    @foreach ($fields as $key => $field)
                        <td>{{ $item[$field['property']] }}</td>
                    @endforeach
                    <td>
                        <button wire:click="edit({{$item->id}})" class="btn btn-sm btn-outline btn-primary py-0">Editar</button> | 
                        <button wire:click="destroy({{$item->id}})" class="btn btn-sm btn-outline py-0">Apagar</button>
                    </td>
                </tr>
                @if ($editing == $item->id)
                    <tr><td colspan="{{ count($fields) + 2 }}"@include('livewire.crud.change')</tr>
                @endif
            @endforeach
        </table>
    @endif
</div> 