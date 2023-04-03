@props(['on' => 'publicado', 'off' => 'borrador'])
<div x-data="{ status: @entangle($attributes->wire('model')).defer, text:'', on:'{{ $on }}', off:'{{ $off }}' }" x-init="if(status){ text=on }else{ text=off }" class="flex items-center">
    <div x-on:click="status = status ? 0 : 1; if(status){ text=on }else{ text=off } "
        :class="status ? 'bg-blue-600' : 'bg-gray-400' "
        class="w-16 h-6 rounded-full flex items-center px-1 cursor-pointer transition-colors duration-300">
        <span class="h-4 w-4 bg-white rounded-full duration-300 transform " :class="status ? 'translate-x-9' : '' "></span>
    </div>
    <span x-text="text" class="ml-2 font-bold w-24"></span>
</div>
