<div class="flex bg-white shadow-lg p-2 rounded-xl w-30 items-center">
    <div class="{{ $color }} p-2 rounded-lg w-8 h-8 flex justify-center items-center">
        {{ $slot }}
    </div>
    <div class="mx-4">
        <p class="text-gray-400 text-sm ">{{ $title }}</p>
        <span class="font-medium">{{ $count }}</span>
    </div>
</div>
