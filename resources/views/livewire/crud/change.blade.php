<div>
    <div class="form-control mb-4 pb-4">
        @foreach ($fields as $key => $field)
            @switch(@$field['type'])
            @case('boolean')
                <label class="cursor-pointer label flex">
                    <span class="label-text">{{ $field['label'] }} <br /><span class="text-gray-400">{{ $field['placeholder'] }}</span></span> 
                    <div>
                        <input wire:model="{{ $key }}" type="checkbox" class="toggle toggle-primary"> 
                        <span class="toggle-mark"></span>
                    </div>
                </label>
                @break
            @default
                <label for="{{ $key }}" class="label">
                    <span class="label-text">{{ $field['label'] }}</span>
                </label>
                <input wire:model="{{ $key }}" type="text" name="{{ $key }}" placeholder="{{ $field['placeholder'] }}" class="input input-bordered @error($key) input-error @enderror" />
                @break
            @endswitch

            @error($key)
                <label class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </label>
            @enderror
        @endforeach
    </div>

    @if (isset($data['id']) && !isset($create))
        <button wire:click="update()" class="btn btn-primary float-right">Salvar</button>
        <button wire:click="cancel()" class="btn float-right mr-6">Cancelar</button>
    @else
        <button wire:click="store()" class="btn btn-wide btn-primary">Criar</button>
    @endif
</div> 