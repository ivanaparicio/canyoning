<div class="container">
    <div class="">
        <h1 class="text-2xl font-bold text-center">NUEVO SERVICIO</h1>
    </div>

    <div class="mt-8 max-w-5xl mx-auto">
        <div class="space-y-4 px-12 py-10 border rounded shadow bg-white">

            <div class="">

                <x-input-label value="Images" class="mb-1"/>

                <ul class="grid grid-cols-4 mb-4 gap-4">

                    @forelse ($images as $key => $image)
                        <li class="relative" wire:key='image-{{$key}}'>

                            @if ($key == $keyMain)
                                <div wire:key='main-{{$key}}' class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center">
                                    <span class="text-white font-bold">Principal</span>
                                </div>
                            @else
                                <div wire:key='second-{{$key}}' wire:click="$set('keyMain', {{$key}})" 
                                    class="absolute inset-0 opacity-0 hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-60 flex items-center justify-center cursor-pointer">
                                    <span class="text-white font-bold text-center">Seleccionar como <br> portada</span>
                                </div>

                                <button wire:click="deleteImage({{$key}})"
                                    class="absolute top-2 right-2 border rounded text-slate-700 font-bold h-8 w-8 bg-white">
                                    &times;
                                </button>
                            @endif

                            <img class="h-40 w-full object-cover object-center" src="{{ $image->temporaryUrl() }}">
                        </li>
                    @empty
                        <li class="text-center font-semibold col-span-full">
                            No se encontraron imagenes
                        </li>
                    @endforelse
                    
                </ul>

                <div x-data="loadFile()" x-bind="loading" class="flex flex-col items-center justify-center mt-2 flex-1">

                    <div x-cloak x-show="isUploading" class="w-full bg-gray-200 h-2 mb-1 rounded-full overflow-hidden">
                        <div class="bg-blue-600 h-2" :style="`width: ${progress}%;`"></div>
                    </div>

                    <input type="file" x-ref="image" multiple accept="image/*" wire:model="preImages" class="hidden">

                    <button x-on:click="$refs.image.click()" class=" px-4 py-1 bg-blue-500 text-white rounded disabled:opacity-70 flex items-center justify-center">
                        <i class="ico icon-image mr-1 text-lg"></i>
                         Seleccionar imagenes
                    </button>

                    @error('images')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                    @error('preImages')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                    @error('preImages.*')
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
