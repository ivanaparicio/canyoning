<div class="pt-2 px-4 pb-14 min-h-screen">
    <div class="mt-12 max-w-5xl mx-auto px-4">

        <h1 class="title uppercase">PLANES</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-10 gap-8">
            @foreach ($plans as $item)
                <div class="bg-white border shadow px-6 py-10 rounded-2xl flex flex-col border-l-8 border-primary-400">
                    <h1 class="text-center font-bold uppercase text-lg">{{$item->title}}</h1>

                    <h1 class="text-center font-bold uppercase mt-4 text-3xl ">{{ $item->price }}</h1>

                    <span class="font-bold text-lg mt-4">Incluye</span>
                    <ul class="mt-2">
                        @foreach ($item->description as $value)
                            <li>
                                <i class="ico icon-check text-sm text-green-500"></i>
                                {{ $value }}
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-auto py-6">
                        <a href="https://api.whatsapp.com/send?phone=57{{ $whatsapp }}&text=Quiero saber más sobre el plan *{{$item->title}}*" target="_blank" class="bg-green-700 inline-flex w-full py-2 rounded-full px-4 items-center justify-center text-white  font-semibold">
                            <i class="ico icon-whatsapp text-2xl text-white mr-1"></i>
                            Preguntar por este plan
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    
</div>
