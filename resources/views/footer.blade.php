@php
    $company = App\Models\Company::find(1);
@endphp

<footer class="bg-black text-white">
    <div class="max-w-5xl mx-auto py-4 grid md:grid-cols-2 ">
        <div class="flex flex-col justify-center items-center">
            <div>
                <div class="text-center md:text-left">
                    <h1 class="text-2xl font-bold mb-3">Horario</h1>
                    <i class="ico icon-calendar"></i>
                    8 AM - 7 PM, Lunes a Domingo
                </div>
                <ul class="flex space-x-4 mt-3 justify-center md:justify-start">
                    @if ($company->instagram)
                        <li>
                            <a href="{{ $company->instagram }}" target="_blank" class="inline-flex rounded-full items-center justify-center" >
                                <i class="ico icon-instagram text-2xl text-white hover:text-pink-500"></i>
                            </a>
                        </li>
                    @endif
                    @if ($company->facebook)
                        <li>
                            <a href="{{ $company->facebook }}" target="_blank" class="inline-flex rounded-full items-center justify-center" >
                                <i class="ico icon-facebook text-2xl text-white hover:text-blue-500"></i>
                            </a>
                        </li>
                    @endif
                    @if ($company->whatsapp)
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=57{{ $company->whatsapp }}" target="_blank" class="inline-flex rounded-full items-center justify-center" >
                                <i class="ico icon-whatsapp text-2xl text-white hover:text-green-500"></i>
                            </a>
                        </li>
                    @endif
                    @if ($company->youtube)
                        <li>
                            <a href="{{ $company->youtube }}" target="_blank" class="inline-flex rounded-full items-center justify-center" >
                                <i class="ico icon-youtube text-2xl text-white hover:text-red-500"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center mt-4 md:mt-0"> 
            <ul class="space-y-4 text-center md:text-left">
                @if ($company->address)
                    <li>
                        <a>
                            <i class="ico icon-maps w-6 inline-block"></i>
                            {{ $company->address }}
                        </a>
                    </li>
                @endif
              
                @if ($company->email)
                    <li>
                        <a href="mailto:{{ $company->email }}" target="_blank">
                            <i class="ico icon-email w-6 inline-flex"></i>
                            {{ $company->email }}
                        </a>
                    </li>
                @endif

                @if ($company->phone1 || $company->phone2)
                    <li class="flex">
                        <i class="ico icon-phone w-6 inline-flex"></i>
                        <div>
                            @if ($company->phone1)
                                <a href="tel:{{ $company->phone1 }}" class="flex">
                                    <p>(+57) {{ $company->phone1 }}</p>
                                </a>
                            @endif
                            @if ($company->phone2)
                                <a href="tel:{{ $company->phone2 }}" class="flex">
                                    <p>(+57) {{ $company->phone2 }}</p>
                                </a>
                            @endif
                        </div>
                    </li>                    
                @endif
            </ul>
        </div>
    </div>
    <div class="text-center ">
        Copyright © {{now()->format('Y')}}  Santander canyoning
    </div>

    @if ($company->whatsapp)
        <x-commons.whatsapp :whatsapp="$company->whatsapp"/>
    @endif

</footer>

<style>
</style>