<div class="container">
    <div class="">
        
        <div class="">
            <h1 class="text-2xl font-bold text-center">PREGUNTAS FRECUENTES</h1>
        </div>

        <div class="max-w-3xl mx-auto mt-8">

            <div class="space-y-4 px-12 py-10 border rounded shadow  bg-white">
                <div>
                    <x-input-label value="Pregunta" class="mb-1"/>
                    <x-text-input wire:model.defer='question.ask' type="text" class="w-full text-sm"/>
                    @error('question.ask')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-input-label value="Respuesta" class="mb-1"/>
                    <x-text-area wire:model.defer='question.response' type="text" class="w-full text-sm" rows="4"/>
                    @error('question.response')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                @if ($isUpdate)
                    <section class="text-right">
                        <x-secondary-button wire:click='cancel'>
                            Cancelar
                        </x-secondary-button>

                        <x-danger-button wire:click='destroy'>
                            Eliminar
                        </x-danger-button>

                        <x-primary-button wire:click='update'>
                            Actualizar
                        </x-primary-button>
                    </section>
                @else
                    <div class="text-right">
                        <x-primary-button wire:click='store'>
                            Guardar
                        </x-primary-button>
                    </div>
                @endif

                <hr class="border-2">

                <div>
                    <h1 class="font-bold text-lg">Preguntas</h1>
                    <ul class="space-y-4 mt-2 list-disc pl-4">
                        @forelse ($questions as $question)
                            <li wire:key='{{ $question->id }}' class="">
                                <h1 wire:click="edit({{ $question->id }})" class="font-bold cursor-pointer hover:underline hover:text-blue-600 leading-none">{{ $question->ask }}</h1>
                                <p class="pl-4 leading-3">{{ $question->response }}</p>
                            </li>
                        @empty
                            <li class="text-sm text-center">
                                No se encontraron preguntas
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            
            
        </div>

    </div>
</div>
