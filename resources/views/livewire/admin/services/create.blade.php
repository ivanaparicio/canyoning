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

                <div x-data="loadFile()" x-bind="loading" class="flex flex-col items-center justify-center mt-2 flex-1">

                    <div x-cloak x-show="isUploading" class="w-full bg-gray-200 h-2 mb-1 rounded-full overflow-hidden">
                        <div class="bg-blue-600 h-2" :style="`width: ${progress}%;`"></div>
                    </div>

                    <input type="file" x-ref="image" accept="image/*" wire:model="image" class="hidden">

                    <button x-on:click="$refs.image.click()" class=" px-4 py-2 bg-blue-500 text-white rounded disabled:opacity-70 flex items-center justify-center">
                        <i class="ico icon-image mr-1 text-lg"></i>
                         Seleccionar imagen de portada
                    </button>

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
                <x-primary-button id="save" wire:click='store' wire:target='image' wire:loading.attr="disabled" class="disabled:opacity-60">
                    Guardar
                </x-primary-button>
            </div>

        </div>
    </div>
</div>
