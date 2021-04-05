<div class="flex flex-col">
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <div {{$attributes->merge(['class'=>'w-full capitalize font-semibold py-2 mb-4 text-lg text-gray-900'])}}>
        {{ $title }}
    </div>

     <div {{$attributes->merge(['class'=>'w-full'])}}>
        {{ $slot }}
    </div>

</div>
