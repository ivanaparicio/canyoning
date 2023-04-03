<nav class="text-slate-700">
    <div class="fixed w-56 shadow bg-white border inset-y-0 flex flex-col">

        <div class="flex items-center justify-center mt-4">
            <a href="/">
                <img class="w-20" src="{{ Storage::url('images/logos/logo.png') }}" alt="">
            </a>
        </div>
            
        <ul class="mt-12 font-medium text-sm">

            <li class="px-2">
                <a href="{{ route('dashboard') }}" class="flex items-center w-full py-2 px-2 {{ request()->routeIs('dashboard') ? 'shadow-inner border rounded-lg bg-slate-100' : '' }}">
                    <i class="ico icon-company text-xl mr-1"></i>
                    Datos de la empresa
                </a>
            </li>

            <li class="px-2">
                <a href="{{ route('services.index') }}" class="flex items-center w-full py-2 px-2 {{ request()->routeIs('services.*') ? 'shadow-inner border rounded-lg bg-slate-100' : '' }}">
                    <i class="ico icon-edit text-xl mr-1"></i>
                    Servicios
                </a>
            </li>

            <li class="px-2">
                <a href="{{ route('questions.index') }}" class="flex items-center w-full py-2 px-2 {{ request()->routeIs('questions.*') ? 'shadow-inner border rounded-lg bg-slate-100' : '' }}">
                    <i class="ico icon-question text-xl mr-1"></i>
                    Preguntas frecuentes
                </a>
            </li>

            <li class="px-2">
                <a href="{{ route('plans.index') }}" class="flex items-center w-full py-2 px-2 {{ request()->routeIs('plans.*') ? 'shadow-inner border rounded-lg bg-slate-100' : '' }}">
                    <i class="ico icon-excel text-xl mr-1"></i>
                    Planes
                </a>
            </li>

            <li class="px-2">
                <a href="{{ route('gallery.index') }}" class="flex items-center w-full py-2 px-2 {{ request()->routeIs('gallery.*') ? 'shadow-inner border rounded-lg bg-slate-100' : '' }}">
                    <i class="ico icon-image text-xl mr-1"></i>
                    Galería
                </a>
            </li>

            <li class="px-2">
                <a href="{{ route('banner.index') }}" class="flex items-center w-full py-2 px-2 {{ request()->routeIs('banner.*') ? 'shadow-inner border rounded-lg bg-slate-100' : '' }}">
                    <i class="ico icon-image text-xl mr-1"></i>
                    Banner
                </a>
            </li>

            <li class="px-2">
                <a href="{{ route('review.index') }}" class="flex items-center w-full py-2 px-2 {{ request()->routeIs('review.*') ? 'shadow-inner border rounded-lg bg-slate-100' : '' }}">
                    <i class="ico icon-image text-xl mr-1"></i>
                    Opiniones
                </a>
            </li>

            <li class="px-2">
                <a href="{{ route('pqrs.index') }}" class="flex items-center w-full py-2 px-2 {{ request()->routeIs('pqrs.*') ? 'shadow-inner border rounded-lg bg-slate-100' : '' }}">
                    <i class="ico icon-alert text-xl mr-1"></i>
                    PQRS
                </a>
            </li>

        </ul>

        <div class="mt-auto mb-10 flex justify-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a onclick="event.preventDefault(); this.closest('form').submit();" class="h-16 w-16 flex items-center justify-center border bg-white shadow rounded-full">
                    <i class="ico icon-logout text-2xl"></i>
                </a>
            </form>
        </div>

    </div>
</nav>