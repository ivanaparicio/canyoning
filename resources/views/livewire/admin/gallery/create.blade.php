<div>
    @if ($open)
   
        <div class="fixed bg-black bg-opacity-60 inset-0 overflow-y-auto">
            <div class="mt-10 mb-14 bg-white max-w-2xl mx-auto  rounded overflow-hidden">
                <div class="space-y-6 py-8 px-6">
                    <div>
                        <x-input-label value="Tipo" class="mb-1"/>
                        <select wire:model="type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="">Seleccionar</option>
                            <option value="0">Subir imagen</option>
                            <option value="1">Link de vídeo</option>
                        </select>
                    </div>

                    @if ($type === '0')
                        <div x-data="loadFile()" x-bind="loading" class="">

                            <x-input-label value="Imagen" class="mb-1"/>
            
                            <div class="flex justify-center">
            
                                @if ($image)
                                    <img class="h-80 object-cover object-center mb-4" src="{{ $image->temporaryUrl() }}">
                                @endif
                                
                            </div>
                            
                            <div x-data="loadFile()" x-bind="loading" class="flex flex-col items-center justify-center mt-2 flex-1">

                                <div x-cloak x-show="isUploading" class="w-full bg-gray-200 h-2 mb-1 rounded-full overflow-hidden">
                                    <div class="bg-blue-600 h-2" :style="`width: ${progress}%;`"></div>
                                </div>
            
                                <input type="file" x-ref="image" accept="image/*" wire:model="image" class="hidden">
            
                                <button x-on:click="$refs.image.click()" class=" px-4 py-2 bg-blue-500 text-white rounded disabled:opacity-70 flex items-center justify-center">
                                    <i class="ico icon-image mr-1 text-lg"></i>
                                     Seleccionar imagen de portada
                                </button>
            
                                @error('image')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
            
                            </div>
            
                        </div>
                    @endif

                    @if ($type === '1')
                        <div>
                            <x-input-label value="Link del vídeo" class="mb-1"/>
                            <x-text-input wire:model.defer='link' type="text" class="w-full text-sm"/>
                            @error('link')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

                </div>
                <div class="bg-slate-100 p-4 text-right space-x-4">

                    <x-secondary-button wire:click='close'>
                        Cancelar
                    </x-secondary-button>

                    <x-primary-button wire:click='store' wire:target='image' wire:loading.attr="disabled" class="disabled:opacity-60">
                        Guardar
                    </x-primary-button>
                </div>
            </div>
        </div>

    @endif
</div>
