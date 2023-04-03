<div class="container">
    <div class="">
        <h1 class="text-2xl font-bold text-center">NUEVO SERVICIO</h1>
    </div>

    <div class="mt-8 max-w-5xl mx-auto">
        <div class="space-y-4 px-12 py-10 border rounded shadow bg-white">

            <div class="">

                <x-input-label value="Imagen de portada" class="mb-1"/>

                <div class="flex justify-center">

                    @if ($image)
                        <img class="h-80 object-cover object-center mb-4" src="{{ $image->temporaryUrl() }}">
                    @endif
                    
                </div>

                <div class="text-center">
                    <input type="file" wire:model='image' accept="image/*">
                    @error('image')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            
            <div>
                <x-input-label value="Nombre del servicio" class="mb-1"/>
                <x-text-input wire:model.defer='title' type="text" class="w-full text-sm"/>
                @error('title')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <x-input-label value="Descripción corta" class="mb-1"/>
                <x-text-area wire:model.defer='content' type="text" class="w-full text-sm"/>
                @error('content')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>

                <div wire:ignore >
                    <x-input-label value="Descripción larga" class="mb-1"/>
                    <x-ck-editor />
                </div>

                @error('body')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

            </div>

            <div>
                <x-input-label value="Estado" class="mb-1"/>
                <x-switch wire:model.defer='status'/>
                @error('status')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-right">
                <x-primary-button id="save" wire:click='store'>
                    Guardar
                </x-primary-button>
            </div>

        </div>
    </div>
</div>
