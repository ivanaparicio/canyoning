<div class="container">

    <div class="max-w-5xl mx-auto mt-4">

        <div class="flex justify-between">
            <h1 class="text-2xl font-bold text-center">PLANES</h1>
            <x-primary-button wire:click="$emitTo('admin.plans.create', 'openCreate')">
                Agregar
            </x-primary-button>
        </div>

        <table class="min-w-full leading-normal border mt-4" >
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Título
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Precio
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Estado
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $plans as $item)
    
                    <tr wire:key='{{ $item->id }}'>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $item->title }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $item->price }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            @if ($item->status)
                                <span class="text-xs text-white px-1 py-0.5 bg-green-600 rounded-full">publlicado</span>
                            @else
                                <span class="text-xs text-white px-1 py-0.5 bg-red-600 rounded-full">borrador</span>
                            @endif
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                            <button wire:click="$emitTo('admin.plans.edit', 'openEdit', {{ $item->id }})">
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

    <livewire:admin.plans.create />
    <livewire:admin.plans.edit />

</div>
