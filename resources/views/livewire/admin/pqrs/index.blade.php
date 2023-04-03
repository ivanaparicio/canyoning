<div class="container">

    <div class="max-w-5xl mx-auto mt-4">

        <div class="">
            <h1 class="text-2xl font-bold text-center">PQRS</h1>
        </div>

        <table class="min-w-full leading-normal border mt-4" >
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tipo de solicitud
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Celular
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Correo
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $pqrs as $item)
                    <tr wire:key='{{ $item->id }}'>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $item->names }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $item->type }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $item->phone }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $item->email }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center space-x-3">
                            <button wire:click="show({{ $item->id }})">
                                <i class="ico icon-eye text-blue-600 text-xl"></i>
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

    @if ($selected)
   
        <div class="fixed bg-black bg-opacity-60 inset-0 overflow-y-auto">
            <div class="mt-10 mb-14 bg-white max-w-3xl mx-auto py-8 px-6 rounded">
                <div class="space-y-6">
                    <div>
                        <x-input-label value="Nombres" class="mb-1"/>
                        <x-text-input value="{{ $selected->names }}" type="text" class="w-full text-sm" readonly />
                    </div>
                    <div>
                        <x-input-label value="Celular" class="mb-1"/>
                        <x-text-input value="{{ $selected->phone }}" type="text" class="w-full text-sm" readonly />
                    </div>
                    <div>
                        <x-input-label value="Email" class="mb-1"/>
                        <x-text-input value="{{ $selected->email }}" type="text" class="w-full text-sm" readonly />
                    </div>
                    <div>
                        <x-input-label value="Tipo de solicitud" class="mb-1"/>
                        <x-text-input value="{{ $selected->type }}" type="text" class="w-full text-sm" readonly />
                    </div>
                    <div>
                        <x-input-label value="Detalle de la solicitud" class="mb-1"/>
                        <x-text-area type="text" class="w-full text-sm" readonly rows="5" >
                            {{ $selected->description }}
                        </x-text-area>
                    </div>
                    <div class="text-right">
                        <x-secondary-button wire:click='close'>
                            Cerrar
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>

    @endif
    
</div>
