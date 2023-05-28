<x-app-layout>
    
    {{-- BANNER --}}

    <div class="pb-14">
        @section('title', 'Inicio')

        <div class="relative overflow-hidden ">

            <div class="absolute h-screen md:h-224 bg-black bg-opacity-70 inset-x-0 z-10"></div>
            
            <ul class="slider2 owl-carousel relative">
                @foreach ($banners as $item)
                    <li class="h-screen md:h-224">
                        <img class="h-screen md:h-224 object-cover object-center w-full" src="{{ Storage::url($item->url) }}" alt="Canyoning">
                    </li>
                @endforeach
            </ul>            

            <div class="absolute inset-0 z-20">
                <div class="text-white mt-80 pl-5 md:pl-20  font-semibold">
                    <p class="text-3xl sm:text-5xl md:text-7xl">
                        Santander <span class="text-primary-400">Canyoning</span>
                    </p>
                    <span class="text-secondary-400 text-2xl sm:text-3xl md:text-5xl font-bold">Deportes de Aventura</span>
                </div>
            </div>
        </div>

        <section x-data="{width:0}" x-init="width=screen.width;" :style="` max-width: ${width}px `" class="mt-20 px-2">
            
            <h1 class="title">NUESTROS SERVICIOS</h1>

            <ul class="slider owl-carousel owl-theme mt-16">

                @foreach ( $services as $service)
                    <li class="min-h-full">
                        <div class="overflow-hidden rounded-2xl bg-white shadow-xl h-full mb-10 flex flex-col pb-4" style="max-height: 35rem; min-height: 35rem">
                            <img class="object-cover object-center " style="max-height: 20rem; min-height: 20rem" src="{{ Storage::url($service->image->where('is_main', 1)->first()->url) }}" alt="">

                            <div class="p-5">
                                <span class="font-semibold text-xs md:text-base uppercase">
                                    {{ $service->title }}
                                </span>
                                <p class="leading-6 text-sm">
                                    {{ Str::limit($service->content, 130, '...') }}
                                </p>
                            </div>

                            <div class="flex mt-auto px-3">
                                <a href="{{ route('service', $service) }}" class="btn btn-primary mt-auto w-full text-center">
                                    Más información
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
                
            </ul>
        </section>

        <section class="mt-20 max-w-5xl mx-auto px-4">

            <h1 class="title">CERTIFICADOS</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12 mt-16">
                <div class="flex justify-center py-10 bg-white rounded-2xl shadow-lg border-l-8 border-secondary-500">
                    <img class="h-32 md:h-48" src="{{ Storage::url('images/certificates/1.png') }}" alt="">
                </div>
                <div class="flex justify-center py-10 bg-white rounded-2xl shadow-lg border-l-8 border-secondary-500">
                    <img class="h-32 md:h-48" src="{{ Storage::url('images/certificates/2.png') }}" alt="">
                </div>
                <div class="flex justify-center py-10 bg-white rounded-2xl shadow-lg border-l-8 border-secondary-500">
                    <img class="h-32 md:h-48" src="{{ Storage::url('images/certificates/3.png') }}" alt="">
                </div>
            </div>

        </section>

        @if ($reviews->count())
            <section class="mt-20 max-w-5xl mx-auto px-4">

                <div class="flex justify-center">
                    <img src="{{ Storage::url('images/app/google-reviews.png') }}" >
                </div>

                <h1 class="title uppercase">Lo que opinan nuestros clientes</h1>

                <ul class="slider3 owl-carousel owl-theme mt-16">
                    @foreach ($reviews as $item)
                        <li >
                            <a href="{{ $item->link }}" target="_blank" class="flex items-center space-x-1.5">
                                <div class="min-w-max">
                                    @if ($item->profile)
                                        <img class="h-16 w-16 rounded-full border object-cover object-center" src="{{ Storage::url($item->profile) }}" >
                                    @else
                                        <img class="h-16 w-16 rounded-full border object-cover object-center" src="https://ui-avatars.com/api/?name={{$item->name}}&background=random" >
                                    @endif
                                </div>
                                <div class="font-semibold">
                                    {{ $item->name }}
                                </div>
                            </a>
                            <div>
                                <p>
                                    {{ $item->description }}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </section>
        @endif

        @if ($questions->count())
            <section class="mt-24 max-w-5xl mx-auto" >

                <h1 class="title">PREGUNTAS FRECUENTES</h1>
                
                <ul class="space-y-3 mt-16">

                    @foreach ($questions as $question )
                        <li x-data="{open:false}" class="border border-gray-300  rounded bg-white">
                            <div x-on:click="open=!open" class="px-6 py-3 flex justify-between items-center cursor-pointer transition-colors duration-300" :class="open ? 'text-primary-400' : '' ">
                                <span class="font-medium sm:font-bold">{{ $question->ask }}</span>
                                <i class="ico icon-arrow-b transform duration-300" :class="open ? 'rotate-180' : '' "></i>
                            </div>
                            <div x-show="open" x-collapse >
                                <p class="pt-4 text-sm sm:text-base border-gray-300 overflow-hidden px-6 pb-6 border-t-2">
                                    {{ $question->response }}
                                </p>
                            </div>
                        </li>
                    @endforeach

                </ul>

            </section>
        @endif

        @if ($map)
            <section class="mt-24 max-w-5xl mx-auto px-4 overflow-hidden" >

                <h1 class="title">COMO LLEGAR</h1>

                <div class="mt-16 embed-container">

                    {!! $map !!}
                    
                </div>
            </section>
        @endif
    </div>

    @push('js')
        <script>
            $(".slider").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 7000,
            autoplayHoverPause: false,
            margin:40,
            center:false,
            responsive:{
                0:{
                    items:1,
                    margin:10,
                },
                640:{
                    items:2
                },
                800:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
            });

            $(".slider2").owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 7000,
                autoplayHoverPause: false,
                margin:0,
                center:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });

            $(".slider3").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 7000,
            autoplayHoverPause: false,
            margin:40,
            center:false,
            responsive:{
                0:{
                    items:1,
                    margin:10,
                },
                640:{
                    items:2
                },
                800:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
            });
        </script>
    @endpush


</x-app-layout>

