<div class="container min-h-screen">

    <div class="">
        <h1 class="text-2xl font-bold text-center">BANNER</h1>
    </div>

    <div class="text-center mt-10 max-w-6xl mx-auto px-4">
        <div class="flex flex-col justify-center items-center">
            @if ($image )
                <img class="h-80" src="{{ $image->temporaryUrl() }}" >

                <x-primary-button wire:click='store' class="mt-4" wire:target='image' wire:loading.attr="disabled" class="disabled:opacity-60 mt-4">
                    Guardar
                </x-primary-button>

            @endif
        </div>

        <div x-data="loadFile()" x-bind="loading" class="flex flex-col items-center justify-center mt-2 flex-1">

            <div x-cloak x-show="isUploading" class="w-full bg-gray-200 h-2 mb-1 rounded-full overflow-hidden">
                <div class="bg-blue-600 h-2" :style="`width: ${progress}%;`"></div>
            </div>

            <input type="file" x-ref="image" accept="image/*" wire:model="image" class="hidden">

            <button x-on:click="$refs.image.click()" class=" px-4 py-2 bg-blue-500 text-white rounded disabled:opacity-70 flex items-center justify-center">
                <i class="ico icon-image mr-1 text-lg"></i>
                 Agregar imagen
            </button>

            @error('image')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror

        </div>

    </div>

    <div class="mt-10 max-w-6xl mx-auto px-4">

        <div class="text-right">
            <x-primary-link href="{{ route('banner.order') }}" class="mt-4">
                <i class="ico icon-order mr-1"></i>
                Cambiar orden
            </x-primary-link>
        </div>

        <div class="grid grid-cols-3 gap-5 mt-4">
            @forelse ($banners as $item)

                <div wire:key='banner-{{$item}}' class="relative">
                    <img class="w-full object-cover object-center rounded" src="{{ Storage::url($item->url) }}">

                    <div class="absolute bottom-0 right-0 p-2">
                        <button class="h-8 w-8 rounded bg-white group" wire:click='destroy({{ $item->id }})'>
                            <i class="ico icon-trash text-red-600 text-lg "></i>
                        </button>
                    </div>

                </div>

          

            @empty
            <div class="text-center py-2 font-semibold col-span-full">
                No se encontraron registros
            </div>
            @endforelse
        </div>

    </div>
    
</div>
