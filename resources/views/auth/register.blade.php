<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/registration_style.css">
</head>

<body>
<header>
    <img src="/img/logo_goriz_color.svg" alt="">
    <img src="/img/Frame 9191.svg" alt="">
</header>

<form class="mainform" method="POST" action="{{ route('register') }}">
    @csrf
    <h2>Регистрация</h2>
    <div class="form-field">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email"/>
        <input name="phone" type="number" class="form-control" id="exampleFormControlInput2" placeholder="Номер телефона">
        <input name="password" type="password" class="form-control  @error('password') is-invalid @enderror" id="inputPassword1" placeholder="Пароль" autocomplete="new-password">
        <input name="repeat_password" type="password" class="form-control" id="inputPassword2" placeholder="Повторите пароль" autocomplete="new-password">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Согласен с <a href="#">политикой обработки данных</a>
        </label>
    </div>
    <div class="form-btn">
        <button class="btn btn-primary" type="submit">Продолжить</button>
        <p>Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
    </div>
</form>

<footer>
    <p>© Центр олимпиадного движения г. Москва, 101000, ул. Жуковского, д.16 Телефон: 8 (495) 625 59 80 Fcod@edu.gov.ru</p>
    <p>Региональный школьный технопарк является оператором</p>
</footer>

<div class="bg-element">
</div>

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

</body>
</html>
