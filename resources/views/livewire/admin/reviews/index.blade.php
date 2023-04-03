<div class="container min-h-screen">


    <div class="max-w-5xl mx-auto mt-4 overflow-hidden">

        <div class="flex justify-between">
            <h1 class="text-2xl font-bold text-center">Opiniones</h1>
            <x-primary-button wire:click="$emitTo('admin.reviews.create', 'openCreate')">
                Agregar
            </x-primary-button>
        </div>

        <table class="min-w-full leading-normal border mt-4 " >
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Imagen
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Link
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $reviews as $item)
    
                    <tr wire:key='review-{{ $item->id }}'>

                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            @if ($item->profile)
                                <img class="h-10 w-10 rounded-full border object-cover object-center" src="{{ Storage::url($item->profile) }}" >
                            @else
                                <img class="h-10 w-10 rounded-full border object-cover object-center" src="https://ui-avatars.com/api/?name={{$item->name}}&color=9b9c9d&background=eceff1" >
                            @endif
                        </td>

                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $item->name }}
                        </td>

                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <a href="{{$item->link}}" class="text-blue-600 underline" >{{ $item->link }}</a>
                        </td>
                        
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">

                            <button wire:click="$emitTo('admin.reviews.edit', 'openEdit', {{ $item->id }})">
                                <i class="ico icon-edit text-blue-600 text-xl"></i>
                            </button>
                            <button wire:click="destroy({{ $item->id }})">
                                <i class="ico icon-trash text-red-600 text-xl"></i>
                            </button>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="20" class="text-center py-2 font-semibold">
                            No se encontraron registros
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <livewire:admin.reviews.create />
    <livewire:admin.reviews.edit />

</div>
