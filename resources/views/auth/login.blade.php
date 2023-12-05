<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Авторизация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/authorization_style.css">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
</head>

<body>
<header>
    <a href="/public/login">
        <img src="./img/logo_goriz_color.svg" alt="">
    </a>
    <a href="/public/login">
        <img src="./img/Frame 9191.svg" alt="">
    </a>
</header>



<!-- Форма авторизации -->

<form class="mainform" method="POST" action="{{ route('login') }}">
    @csrf
    <h2>Вход в аккаунт</h2>
    <div class="form-field">

        <!-- Session Status -->
        <x-auth-session-status style="color: #00bd00;" class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors style="color: red" class="mb-4" :errors="$errors" />

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email или телефон" name="login">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword2" placeholder="Пароль" name="password">
        <a href="{{ route('password.request') }}">Восстановить пароль</a>
    </div>
    <div class="form-btn">
        <button class="btn btn-primary" type="submit">Войти</button>
        <p>Нет аккаунта? <a href="{{ route('register') }}">Регистрация</a></p>
    </div>
</form>

<!-- ----------------- -->



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
