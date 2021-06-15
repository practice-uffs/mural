<div>
    <input type="hidden" wire:model="selected_id">
    
    @foreach ($fields as $key => $field)
        <div class="form-group">
            <label for="{{ $key }}">Enter Name</label>
            <input wire:model="data.{{ $key }}" type="text" name="{{ $key }}" placeholder="Name" class="form-control input-sm" />
            @error('data.title') <span class="error">{{ $message }}</span> @enderror
        </div>
    @endforeach

    @if (isset($data['id']))
        <button wire:click="update()" class="btn btn-primary">Update</button>
    @else
        <button wire:click="store()" class="btn btn-primary">Create</button>
    @endif
</div> 