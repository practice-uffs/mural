<div>
    @foreach ($fields as $key => $field)
        <div class="form-group">
            <label for="{{ $key }}">{{ $field['label'] }}</label>
            <input wire:model="{{ $key }}" type="text" name="{{ $key }}" placeholder="{{ $field['placeholder'] }}" class="form-control input-sm" />
            @error($key) <span class="error">{{ $message }}</span> @enderror
        </div>
    @endforeach

    @if (isset($data['id']) && !isset($create))
        <button wire:click="cancel()" class="btn btn-danger">Cancel</button>
        <button wire:click="update()" class="btn btn-primary">Update</button>
    @else
        <button wire:click="store()" class="btn btn-primary">Create</button>
    @endif
</div> 