<div class="pt-3 px-4 pb-14 bg-white bg-opacity-60">

    <div class="max-w-7xl mx-auto">

        <div class="grid grid-cols-1  md:grid-cols-10 gap-x-4">

            <section class="md:col-span-7">
                <div class="flex justify-center">
                    <img class="object-cover object-center h-[34rem] w-full" src="{{ Storage::url($service->image->url) }}">
                </div>

                <div class="mt-8 ">

                    <h1 class="title uppercase">{{ $service->title }}</h1>

                    <p class="mt-8 font-semibold">
                        {{ $service->content }}
                    </p>

                    <div class="mt-8 ck-content">
                        {!! $service->body !!}
                    </div>

                </div>

            </section>

            <section class="md:col-span-3 mt-10 md:mt-4">

                <h1 class="font-semibold text-lg border-b-2 border-primary-400 text-center">Más servicios</h1>

                <ul class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-4 md:block md:space-y-3 ">

                    @foreach ($services as $item)
                        <li class="relative">
                            <a href="{{ route('service', $item) }}">
                                <img class="h-40 object-cover object-center w-full" src="{{ Storage::url($item->image->url) }}" alt="">
                                <h1 class="absolute bottom-0 bg-secondary-500 text-white inset-x-0 text-center py-1 truncate px-2">{{ $item->title }}</h1>
                                <div class="absolute inset-0 group hover:bg-black hover:bg-opacity-60 flex items-center justify-center text-white">
                                    <div class="hidden group-hover:flex items-center">
                                        <i class="ico icon-eye mr-1 text-xl"></i>
                                        <span>Ver</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>

        </div>

    </div>  

</div>
