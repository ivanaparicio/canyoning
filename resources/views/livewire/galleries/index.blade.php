<div class="pt-2 px-4 pb-14 min-h-screen">
    <div class="max-w-6xl px-4 mx-auto pt-10">
        <h1 class="title uppercase">Selecciona una galería</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7 mt-10">
            @foreach ($services as $item)
                <a href="{{ route('gallery.show', $item) }}" class="relative rounded-md overflow-hidden">
                    <img class="h-72 object-cover object-center w-full" src="{{ Storage::url($item->galleries()->where('type', 0)->first()->image->url) }}">
                    <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center">
                        <h1 class="text-white uppercase font-semibold">{{ $item->title }}</h1>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>