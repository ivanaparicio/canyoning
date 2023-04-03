<div class="container">
    
    <div class="">
        <h1 class="text-2xl font-bold text-center">GALERÍA</h1>
    </div>

    <div class="max-w-5xl mx-auto mt-8">
        <div class="px-12 py-10 border rounded shadow  bg-white">
            <div class="">
                <x-input-label value="Selecciona un servicio" class="mb-1"/>
                <select wire:model="service_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Seleccionar</option>
                    @foreach ($services as $item)
                        <option value="{{ $item->id }}"> {{ $item->title }} </option>
                    @endforeach
                </select>
            </div>
        

            @if ($service_id)
                <div class="mt-4">
                    <h1 class="text-center font-bold text-lg uppercase"> {{ $services->find($service_id)->title  }} </h1>
                    <div class="text-right">
                        <x-primary-button wire:click="$emitTo('admin.gallery.create', 'openCreate', {{$service_id}})">
                            Agregar
                        </x-primary-button>
                    </div>
                    <div class="grid grid-cols-3 gap-5 mt-5">
                        
                        @foreach ($galleries as $item)
                            <div class="relative" wire:key='{{ $item->id }}'>
                                @if ($item->type == 0)
                                    <img class="h-40 object-cover object-center w-full" src="{{ Storage::url($item->image->url) }}">
                                @else
                                    <div class='embed-container'>
                                        {!! $item->link !!}
                                    </div>
                                @endif

                                <div class="absolute bottom-0 right-0 p-2">
                                    <button class="h-8 w-8 rounded bg-white group" wire:click='destroy({{ $item->id }})'>
                                        <i class="ico icon-trash text-red-600 text-lg "></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                    <div class="px-4 py-2">
                        {{ $galleries->links() }}
                    </div>
                </div>
            @endif

        </div>

    </div>

    <livewire:admin.gallery.create />

</div>
