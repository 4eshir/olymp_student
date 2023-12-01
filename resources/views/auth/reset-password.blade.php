<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/authorization_style.css">
</head>

<body>
<header>
    <a href="/login">
        <img src="/img/logo_goriz_color.svg" alt="">
    </a>
    <a href="/login">
        <img src="/img/Frame 9191.svg" alt="">
    </a>
</header>


<div class="mb-4 text-sm text-gray-600">

</div>

<!-- Session Status -->

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form class="mainform" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="form-field">
            <x-label for="email" :value="__('Email')" />

            <x-input type="email" class="form-control" id="email" placeholder="example@yandex.ru" name="email" :value="old('email', $request->email)"/>
        </div>

        <div class="form-field">
            <x-label for="password" :value="__('Password')" />

            <input id="password" class="form-control" type="password" name="password" required />
        </div>

        <div class="form-field">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <input id="password_confirmation" class="form-control"
                     type="password"
                     name="password_confirmation" required />
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="form-btn">
            <button class="btn btn-primary" type="submit">Обновить пароль</button>
        </div>

    </form>


    {{--<x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation" class="block mt-1 w-full"
                     type="password"
                     name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button>
                {{ __('Reset Password') }}
            </x-button>
        </div>
    </form>--}}


<footer>
    <p>© Центр олимпиадного движения г. Москва, 101000, ул. Жуковского, д.16 Телефон: 8 (495) 625 59 80 Fcod@edu.gov.ru</p>
    <p>Региональный школьный технопарк является оператором</p>
</footer>

<div class="bg-element">
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    const bgElement = document.querySelector('.bg-element');
    const body = document.querySelector('body');

    body.addEventListener('mousemove', (event) => {
        const x = event.clientX ;
        const y = event.clientY;
        const centerX = window.innerWidth / 2;
        const centerY = window.innerHeight / 2;

        const distanceToCenter = Math.sqrt((x - centerX)**2 + (y - centerY)**2);
        const maxDistance = Math.sqrt(centerX**2 + centerY**2);
        const gradientSize = 20 + (distanceToCenter / maxDistance) * 100;

        bgElement.style.setProperty('--x', `${x}px`);
        bgElement.style.setProperty('--y', `${y}px`);
        bgElement.style.setProperty('--size', `${gradientSize}%`);

    })

</script>
</html>
