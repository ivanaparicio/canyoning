<div class="container">
    
    <div class="">
        <h1 class="text-2xl font-bold text-center">INFORMACIÓN DE LA EMPRESA</h1>
    </div>

    <div class="mt-8 max-w-3xl mx-auto">
        <div class="space-y-4 px-12 py-10 border rounded shadow  bg-white">
            
            <div>
                <x-input-label value="Email" class="mb-1"/>
                <x-text-input wire:model.defer='company.email' type="text" class="w-full text-sm"/>
                @error('company.email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-input-label value="Dirección" class="mb-1"/>
                <x-text-input wire:model.defer='company.address' type="text" class="w-full text-sm"/>
                @error('company.address')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>

            </div>
           <div class="grid grid-cols-2 gap-x-4">
                <div>
                    <x-input-label value="Celular 1" class="mb-1"/>
                    <x-text-input wire:model.defer='company.phone1' type="text" class="w-full text-sm"/>
                    @error('company.phone1')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-input-label value="Celular 2" class="mb-1"/>
                    <x-text-input wire:model.defer='company.phone2' type="text" class="w-full text-sm"/>
                    @error('company.phone2')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
           </div>
            <div>
                <x-input-label value="Horario" class="mb-1"/>
                <x-text-input wire:model.defer='company.hours' type="text" class="w-full text-sm"/>
                @error('company.hours')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-input-label value="Whatsapp" class="mb-1"/>
                <x-text-input wire:model.defer='company.whatsapp' type="text" class="w-full text-sm"/>
                @error('company.whatsapp')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-input-label value="Instagram" class="mb-1"/>
                <x-text-input wire:model.defer='company.instagram' type="text" class="w-full text-sm"/>
                @error('company.instagram')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-input-label value="Facebook" class="mb-1"/>
                <x-text-input wire:model.defer='company.facebook' type="text" class="w-full text-sm"/>
                @error('company.facebook')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-input-label value="Youtube" class="mb-1"/>
                <x-text-input wire:model.defer='company.youtube' type="text" class="w-full text-sm"/>
                @error('company.youtube')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-input-label value="Mapa" class="mb-1"/>
                <x-text-input wire:model.defer='company.maps' type="text" class="w-full text-sm"/>
                @error('company.maps')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-right">
                <x-primary-button wire:click='update'>
                    Guardar
                </x-primary-button>
            </div>

        </div>
    </div>

</div>
