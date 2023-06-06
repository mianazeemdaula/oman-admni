<div class="p-4">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <span class="bi bi-app-indicator mr-4"></span>
            <div class="flex bg-white rounded-3xl p-1">
                <?php $segments = ''; ?>
                @foreach (Request::segments() as $segment)
                    <?php $segments .= '/' . $segment; ?>
                    @if ($loop->last)
                        <span class="px-1" href="{{ $segments }}">{{ $segment }}</span>
                    @else
                        <span class="px-1" href="{{ $segments }}">{{ $segment }}</span>
                        <span class="bi bi-arrow-right"></span>
                    @endif
                @endforeach
            </div>
        </div>
        <img src="https://ui-avatars.com/api/?name=John+Doe" alt="" srcset=""
            class="rounded-full w-10 h-10">
    </div>
    <div class="border-b-2 my-2"></div>
</div>
