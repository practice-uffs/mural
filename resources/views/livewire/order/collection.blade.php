<div>
    <div class="col-md-6">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Sorry!</strong> invalid input.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                <td>{{$loop->index + 1}}</td>
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