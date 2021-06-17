<div>
    <div class="form-control mb-4 pb-4">
        @foreach ($fields as $key => $field)
            @switch(@$field['type'])
            @case('boolean')
                <label class="cursor-pointer label flex">
                    <span class="label-text">{{ $field['label'] }} <br /><span class="text-gray-400">{{ @$field['placeholder'] }}</span></span> 
                    <div>
                        <input wire:model="{{ $key }}" type="checkbox" class="toggle toggle-primary"> 
                        <span class="toggle-mark"></span>
                    </div>
                </label>
                @break
            @case('select')
                <label class="label">
                    <span class="label-text">{{ $field['label'] }}</span> 
                    <a href="#" class="label-text-alt"></a>
                </label> 
                <select wire:model="{{ $key }}" class="select select-bordered w-full">
                    <option value=""></option> 
                    @foreach ($field['options'] as $info)
                        <option value="{{ $info['id']}}">{{ $info['text']}}</option> 
                    @endforeach
                </select> 
                <label class="label">
                    <a href="#" class="label-text-alt"></a> 
                </label>
                @break
            @default
                <label for="{{ $key }}" class="label">
                    <span class="label-text">{{ $field['label'] }}</span>
                </label>
                <input wire:model="{{ $key }}" type="text" name="{{ $key }}" placeholder="{{ @$field['placeholder'] }}" class="input input-bordered @error($key) input-error @enderror" />
                @break
            @endswitch

            @error($key)
                <label class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </label>
            @enderror
        @endforeach

        <div
            wire:ignore
            x-data="{pond: null}"
            x-init="
                pond = FilePond.create($refs.input);
                pond.setOptions({
                    allowMultiple: true,
                    labelIdle:'Veuillez sélectionner un fichier',
                    labelFileProcessingComplete: 'Upload terminé',
                    server: {
                        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                            @this.upload('file', file, load, error, progress)
                        },
                        revert: (filename, load) => {
                            @this.removeUpload('file', filename, load)
                        },
                    },
                });
        ">
            <input type="file" name="file" x-ref="input">
        </div>
    </div>

    @if (isset($data['id']) && !isset($create))
        <button wire:click="update()" class="btn btn-primary float-right">Salvar</button>
        <button wire:click="cancel()" class="btn float-right mr-6">Cancelar</button>
    @else
        <button wire:click="store()" class="btn btn-wide btn-primary">Criar</button>
    @endif
</div> 