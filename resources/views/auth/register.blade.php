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

        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Email" value="{{ old('email') }}"/>
        <input name="phone_number" class="form-control tel" id="exampleFormControlInput2" placeholder="Номер телефона" value="{{ old('phone_number') }}">
        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword1" placeholder="Пароль" autocomplete="new-password">
        <input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword2" placeholder="Повторите пароль" autocomplete="new-password">
    </div>

    @if(count($errors) > 0)
        <div class="alert alert-danger" style="width: 100%; padding-left: 5px; padding-bottom: 0; margin-bottom: 0">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
    window.addEventListener("DOMContentLoaded", function() {
        [].forEach.call( document.querySelectorAll('.tel'), function(input) {
            var keyCode;
            function mask(event) {
                event.keyCode && (keyCode = event.keyCode);
                var pos = this.selectionStart;
                if (pos < 3) event.preventDefault();
                var matrix = "+7 (___) ___ ____",
                    i = 0,
                    def = matrix.replace(/\D/g, ""),
                    val = this.value.replace(/\D/g, ""),
                    new_value = matrix.replace(/[_\d]/g, function(a) {
                        return i < val.length ? val.charAt(i++) : a
                    });
                i = new_value.indexOf("_");
                if (i != -1) {
                    i < 5 && (i = 3);
                    new_value = new_value.slice(0, i)
                }
                var reg = matrix.substr(0, this.value.length).replace(/_+/g,
                    function(a) {
                        return "\\d{1," + a.length + "}"
                    }).replace(/[+()]/g, "\\$&");
                reg = new RegExp("^" + reg + "$");
                if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) {
                    this.value = new_value;
                }
                if (event.type == "blur" && this.value.length < 5) {
                    this.value = "";
                }
            }

            input.addEventListener("input", mask, false);
            input.addEventListener("focus", mask, false);
            input.addEventListener("blur", mask, false);
            input.addEventListener("keydown", mask, false);

        });

    });


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
