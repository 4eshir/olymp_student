...
<div class="flex justify-center max-w-5xl min-h-screen pb-16 mx-auto">
    <div class="leading-none text-center text-black md:text-left">
        <h1 class="mb-2 text-5xl font-extrabold">{{ $errorCode }}</h1>
        <p class="text-xl text-gray-900">
            @isset($title)
                {{ $title }}
            @else
                Hello, is it me you're looking for?
            @endisset

            @if($homeLink ?? false)
                <a href="{{ url('/') }}" class="font-bold underline transition duration-300 hover:text-blue-600">Go home</a>
            @endif
        </p>
    </div>
</div>
...
