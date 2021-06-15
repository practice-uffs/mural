<div>
    <div class="col-md-6">

    @include('livewire.order.change')

    @if ($show_change_modal)
        @include('livewire.order.change')
    @endif

    <table class="table table-striped" style="margin-top:20px;">
        <tr>
            <td>NO</td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>ACTION</td>
        </tr>

        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td>
                    <button wire:click="edit({{$item->id}})" class="btn btn-sm btn-outline-danger py-0">Edit</button> | 
                    <button wire:click="destroy({{$item->id}})" class="btn btn-sm btn-outline-danger py-0">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
</div> 