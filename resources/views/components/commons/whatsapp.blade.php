@props(['whatsapp'])
<div class="fixed bottom-8 sm:bottom-14 left-4 sm:left-14 z-20">
    <a href="https://api.whatsapp.com/send?phone=57{{ $whatsapp }}" 
        target="_blank" 
        class="py-2 px-6 bg-green-600 text-white flex items-center justify-center  rounded-full font-semibold">
        <i class="ico icon-whatsapp text-xl sm:text-2xl md:text-4xl mr-2"></i>
        Hablar con un asesor
    </a>
</div>