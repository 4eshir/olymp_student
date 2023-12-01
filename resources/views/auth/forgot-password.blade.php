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



        <!-- Session Status -->

        <form class="mainform" method="POST" action="{{ route('password.email') }}">
            @csrf
            <h5>{{ __('Вы забыли пароль? Не проблема, укажите Ваш e-mail и мы отправим на него ссылку для сброса пароля.') }}</h5>
            <!-- Email Address -->
            <div class="form-field">
                <x-label for="email" :value="__('Email')" />

                <input type="email" class="form-control" id="email" placeholder="example@yandex.ru" name="email">
            </div>

            <x-auth-session-status style="color: #00bd00;" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors :errors="$errors" style="color: red; margin-top: 0; width: 100%"/>

            <div class="form-btn">
                <button class="btn btn-primary" type="submit">Восстановить пароль</button>
            </div>

        </form>


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
