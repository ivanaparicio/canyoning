<div>
    @if ($open)
   
        <div class="fixed bg-black bg-opacity-60 inset-0 overflow-y-auto">
            <div class="mt-10 mb-14 bg-white max-w-2xl mx-auto  rounded overflow-hidden">
                <div class="space-y-6 py-8 px-6">
                    
                    <div>
                        <x-input-label value="Nombre del plan" class="mb-1"/>
                        <x-text-input wire:model.defer='title' type="text" class="w-full text-sm"/>
                        @error('title')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div>
                        <x-input-label value="Precio" class="mb-1"/>
                        <x-text-input wire:model.defer='price' type="text" class="w-full text-sm"/>
                        @error('price')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div>
                        <x-input-label value="Incluye" class="mb-1"/>
                        <div class="flex space-x-4">
                            <x-text-input wire:model.defer='include' type="text" class="w-full text-sm"/>
                            @if ($this->key !== null)
                                <button wire:key='cancel' wire:click="cancel" class="px-2 text-white bg-gray-600 rounded">
                                    Cancelar
                                </button>
                                <button wire:key='save' wire:click="save" class="px-2 text-white bg-blue-600 rounded">
                                    Actualizar
                                </button>
                            @else
                                <button wire:key='edit' wire:click="add" class="px-2 text-white bg-blue-600 rounded">
                                    Agregar
                                </button>
                            @endif
                        </div>
                        @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <ul class="space-y-1">
                        @foreach ($description as $key => $item)
                            <ul wire:key='include-{{$key}}' class="flex justify-between hover:border-b">
                                <span>{{$item}}</span>
                                <div>
                                    <i wire:click="edit({{ $key}})" class="ico icon-edit text-blue-600 cursor-pointer text-xl"></i>
                                    <i wire:click="delete({{ $key}})" class="ico icon-trash text-red-600 cursor-pointer text-xl"></i>
                                </div>
                            </ul>
                        @endforeach
                    </ul>

                    <div>
                        <x-input-label value="Estado" class="mb-1"/>
                        <x-switch wire:model.defer='status'/>
                        @error('status')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="bg-slate-100 p-4 text-right space-x-4">

                    <x-secondary-button wire:click="$set('open', false)">
                        Cancelar
                    </x-secondary-button>

                    <x-primary-button wire:click='store'>
                        Guardar
                    </x-primary-button>
                </div>
            </div>
        </div>

    @endif
</div>
