<div class="container min-h-screen">

    <div class="">
        <h1 class="text-2xl font-bold text-center">BANNER</h1>
    </div>

    <div class="text-center mt-10 max-w-6xl mx-auto px-4">
        <div class="flex flex-col justify-center items-center">
            @if ($image )
                <img class="h-80" src="{{ $image->temporaryUrl() }}" >

                <x-primary-button wire:click='store' class="mt-4">
                    Guardar
                </x-primary-button>

            @endif
        </div>
        <input type="file" wire:model='image' class="mt-4">

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
