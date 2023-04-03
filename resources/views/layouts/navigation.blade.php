<nav x-data="menu()"  x-on:scroll.window="scrollMenu()" >
    <div id="menuTop"
        x-cloak
        class="hidden md:block fixed inset-x-0 z-40 py-1 transition-colors duration-500 " :class="isScroll ? 'bg-white shadow' : '' ">
        <div class="max-w-5xl mx-auto flex px-4">

            <div class=" duration-500 overflow-hidden transition-[height]" :class="isScroll ? 'h-16' : 'h-32' " >
                <a href="/">
                    <img class="h-full" src="{{ Storage::url('images/logos/logo.png') }}" alt="canyoning">
                </a>
            </div>

            <ul class="text-white flex-1 flex justify-center items-center space-x-2 text-lg font-semibold">
                
                <x-commons.nav-link name="Inicio" route="home" :isActive="request()->routeIs('home')" />

                <x-commons.nav-link name="Planes" route="plans" :isActive="request()->routeIs('plans')" />

                <x-commons.nav-link name="Galería" route="gallery.all" :isActive="request()->routeIs('gallery.*')" />

                <x-commons.nav-link name="PQRS" route="pqrs" :isActive="request()->routeIs('pqrs')" />
                
            </ul>

        </div>
    </div>

    <div x-data="{open:false}" class="md:hidden">
        
        <div class=" fixed inset-x-0 bg-white h-16 z-50 flex items-center justify-between px-4 border-b shadow">
            <div class="flex justify-center">
                <a href="/">
                    <img class="h-14" src="{{ Storage::url('images/logos/logo.png') }}">
                </a>
            </div>
            <div>
                <button x-on:click="open=true" class="bg-primary-400 px-2 py-1 rounded">
                    <i class="ico icon-menu text-white text-2xl"></i>
                </button>
            </div>
        </div>

        <div 
            x-cloak
            x-show="open"
            x-transition:enter="transition duration-700 ease-in-out transform sm:duration-700"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition duration-700 ease-in-out transform sm:duration-700"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed inset-y-0 w-60 bg-white right-0 z-50 border shadow">

            <button x-on:click="open=false" class="transform -translate-x-full bg-gray-700 text-white px-2 py-1 rounded-l-lg text-2xl">
                &times;
            </button>

            <div class="flex justify-center mt-6 px-4">
                <a href="/">
                    <img class="h-20" src="{{ Storage::url('images/logos/logo.png') }}">
                </a>
            </div>

            <ul class="mt-10 space-y-4">
                <x-commons.nav-link-responsive name="Inicio" route="home" :isActive="request()->routeIs('home')" />

                <x-commons.nav-link-responsive name="Planes" route="plans" :isActive="request()->routeIs('plans')" />

                <x-commons.nav-link-responsive name="Galería" route="gallery.all" :isActive="request()->routeIs('gallery.*')" />

                <x-commons.nav-link-responsive name="PQRS" route="pqrs" :isActive="request()->routeIs('pqrs')" />
            </ul>

        </div>
    </div>
</nav>

@push('js')
    <script>
        function menu (){
            return {

                isScroll: true,
                isSidebarOpen: false,

                init(){
                    this.scrollMenu();
                },

                scrollMenu(){
                    @if (request()->routeIs('home'))
                        this.isScroll = (window.pageYOffset > 100) ? true : false
                    @endif
                },
            }
        }
    </script>
@endpush