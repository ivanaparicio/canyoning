<div class="pt-2 px-4 pb-14 min-h-screen">
    <div class="max-w-6xl px-4 mx-auto pt-10">
        <h1 class="title uppercase">{{ $service->title }}</h1>
        <div class="mt-10">
            <h1 class="text-lg font-bold">FOTOS</h1>
            <div class="px-4 py-2">
                {{ $photos->links() }}
            </div>
            <div x-data class="grid grid-cols-2 lg:grid-cols-3 gap-7 mt-3">
                @foreach ($photos as $item)
                    <div x-on:click="$dispatch('set-url', '{{ Storage::url($item->image->url) }}')" class="h-40 md:h-60 rounded overflow-hidden" wire:key='{{ $item->id }}'>
                        <img class="h-full object-cover object-center w-full rounded hover:scale-125 transition-transform duration-300" src="{{ Storage::url($item->image->url) }}">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-10">
            <h1 class="text-lg font-bold">VÍDEOS</h1>
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-7 mt-3">
                @foreach ($videos as $item)
                    <div wire:key='{{ $item->id }}'>
                        <div class='embed-container'>
                            {!! $item->link !!}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="px-4 py-2">
                {{ $videos->links() }}
            </div>
        </div>
    </div>

    <x-commons.view />

</div>
