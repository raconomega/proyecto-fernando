<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-jet-danger-button>


    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo post
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="image" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <span class="font-medium">¡Imagen cargando!</span> Espere un momento hasta que la imagen se haya procesado.
            </div>

        @if($image)
            <img class="mb-4" src="{{$image->temporaryUrl()}}"> 
        @endif

            <div class="mb-4">
                <x-jet-label value="Titulo del post" />
                <x-jet-input type="text" class="w-full" wire:model="title"/>

                <x-jet-input-error for="title" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Contenido del post" />
                
                <textarea wire:model.defer="content" class="form-control w-full" rows="6"></textarea>

                <x-jet-input-error for="content" />
            </div>

            <div>
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-jet-input-error for="image" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Crear post
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>

</div>
