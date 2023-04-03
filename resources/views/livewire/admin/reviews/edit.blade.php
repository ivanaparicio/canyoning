<div>
    @if ($open)
   
        <div class="fixed bg-black bg-opacity-60 inset-0 overflow-y-auto">
            <div class="mt-10 mb-14 bg-white max-w-2xl mx-auto  rounded overflow-hidden">
                <div class="space-y-6 py-8 px-6">

                    <div class="flex flex-col items-center justify-center">

                        @if ($image)
                            <img class="h-40 w-40 object-cover object-center rounded-full border shadow "  src="{{ $image->temporaryUrl() }}">
                        @elseif($review->profile)
                            <img class="h-40 w-40 object-cover object-center rounded-full border shadow "  src="{{ Storage::url($review->profile) }}">
                        @endif

                        <input type="file" wire:model="image" class="mt-4">

                    </div>
                    
                    <div>
                        <x-input-label value="Link" class="mb-1"/>
                        <x-text-input wire:model.defer='review.link' type="text" class="w-full text-sm"/>
                        @error('review.link')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div>
                        <x-input-label value="Nombre" class="mb-1"/>
                        <x-text-input wire:model.defer='review.name' type="text" class="w-full text-sm"/>
                        @error('review.name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div>
                        <x-input-label value="Reseña" class="mb-1"/>
                        <x-text-area wire:model.defer='review.description' class="w-full text-sm" rows="5"/>
                        @error('review.description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="bg-slate-100 p-4 text-right space-x-4">

                    <x-secondary-button wire:click="$set('open', false)">
                        Cancelar
                    </x-secondary-button>

                    <x-primary-button wire:click='store'>
                        Actualizar
                    </x-primary-button>
                </div>
            </div>
        </div>

    @endif
</div>
