<div>
    <div class="col-md-6">

    @if ($show_create_panel)
        @include('livewire.crud.change', ['create' => true])
    @endif

    <table class="table table-striped" style="margin-top:20px;">
        <tr>
            <td>ID</td>
            @foreach ($fields as $key => $field)
                <td>{{ $field['label'] }}</td>
            @endforeach
            <td></td>
        </tr>

        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                @foreach ($fields as $key => $field)
                    <td>{{ $item[$field['property']] }}</td>
                @endforeach
                <td>
                    <button wire:click="edit({{$item->id}})" class="btn btn-sm btn-outline-danger py-0">Edit</button> | 
                    <button wire:click="destroy({{$item->id}})" class="btn btn-sm btn-outline-danger py-0">Delete</button>
                </td>
            </tr>
            @if ($editing == $item->id)
                <tr><td colspan="{{ count($fields) + 2 }}"@include('livewire.crud.change')</tr>
            @endif
        @endforeach
    </table>
    </div>
</div> 