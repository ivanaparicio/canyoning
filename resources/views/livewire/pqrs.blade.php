<div class="pt-2 px-4 pb-14">
    <div class="mt-12 max-w-2xl mx-auto ">

        <h1 class="title uppercase">Realiza tu solicitud</h1>

        <div class="space-y-4 px-6 md:px-12 py-10 border rounded shadow bg-white mt-8">

           <div>
                <x-input-label value="Nombre completo" class="mb-1"/>
                <x-text-input wire:model.defer='names' type="text" class="w-full text-sm"/>
                @error('names')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

           <div>
                <x-input-label value="Celular" class="mb-1"/>
                <x-text-input wire:model.defer='phone' type="text" class="w-full text-sm"/>
                @error('phone')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

           <div>
                <x-input-label value="Correo" class="mb-1"/>
                <x-text-input wire:model.defer='email' type="text" class="w-full text-sm"/>
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

           <div>
                <x-input-label value="Tipo se solicitud" class="mb-1"/>
                <select wire:model.defer='type' class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" >
                    <option value="">Seleccionar</option>
                    <option value="1">Petición</option>
                    <option value="2">Queja</option>
                    <option value="3">Reclamo</option>
                    <option value="4">Sugerencia</option>
                </select>
                @error('type')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <x-input-label value="Detalle de la solicitud" class="mb-1"/>
                <x-text-area wire:model.defer='description' type="text" class="w-full text-sm" rows="4" />
                @error('description')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-right">
                <x-primary-button wire:click='store'>
                    Enviar
                </x-primary-button>
            </div>

    </div>
</div>
