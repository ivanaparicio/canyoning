<div x-data="mainOrder()" class="container">

    <div class="border bg-white max-w-lg mx-auto px-8 py-10">

        <div class="border">
            <div class="grid grid-cols-3 py-2 font-bold bg-slate-100 px-3 text-gray-700 select-none">
                <span class="col-span-1">Orden</span>
                <span class="col-span-1">Imagen</span>
                <span class="col-span-1"></span>
            </div>

            <ul class="drag-list divide-y select-none px-3">
                @forelse ($banners as $item)
                    <li data-id="{{ $item['id'] }}" wire:key="banners-{{$item['id']}}" class="grid grid-cols-3 py-2">
                        <div class="flex items-center col-span-1 px-4">
                            {{ $item['order'] }}
                        </div>
                        <div class="col-span-1">
                            <img  src="{{ Storage::url($item['url']) }}" >
                        </div>
                        <div class="flex items-center col-span-1 px-4">
                            <span class="drag-area ml-auto" x-on:click="">
                                <i class="ico icon-ellipsis"></i>
                            </span>
                        </div>
                    </li>
                @empty
                    <li class="text-center py-2">
                        No se encontraron registros
                    </li>
                @endforelse
            </ul>
    </div>


    </div>

    @if (count($banners))
        <div class="text-center">
            <x-primary-button wire:click='saveOrder' class="mt-4">
                Guardar
            </x-primary-button>
        </div>
    @endif


</div>

@push('js')
<script>
    function mainOrder(){
        return {

            orders: @entangle('orders').defer,

            init(){

                Livewire.on('setOrders', orders => {
                    this.orders = orders
                });

                $('#summernote').summernote({
                    height: 300,
                });

                $('li').arrangeable({dragSelector: '.drag-area'});
                $('.drag-list').on('drag.end.arrangeable', function () {
                    orders = [];

                    const listItems = $(".drag-list li");
                    var order = 1;
                    for (var li of listItems) {

                        var id = $(li).data("id");

                        orders.push({ id, order });
                        order++;
                    }

                    Livewire.emit('setOrders', orders);

                });
            }
        }
    }
</script>
@endpush

