<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{!! csrf_token() !!}" />

    <title>Авторизация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/authorization_style.css">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
<body>
    <header >
        <a href="/public/login">
            <img src="./img/logo_goriz_color.svg" alt="">
        </a>
        <a href="/public/login">
            <img src="./img/Frame 9191.svg" alt="">
        </a>
    </header>

    <div class="login_info">
        <p style="font-size: 17px;">Уважаемые участники регионального этапа ВсОШ!</p>
        <p>Войдите в Ваш аккаунт или пройдите <a href="{{ route('register') }}">регистрацию</a></p>
    </div>

    <form class="mainform animate__animated animate__fadeIn" method="POST" action="{{ route('login') }}">
        <div class="form-field">
            @if(count($errors) > 0)
                <div class="alert alert-danger" style="width: 100%; padding-left: 5px; padding-bottom: 0; margin-bottom: 0">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <h2>Вход в аккаунт</h2>
        <div class="form-field">

            <!-- Session Status -->
            <x-auth-session-status style="color: #00bd00;" class="mb-4" :status="session('status')" />

            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}

            <input type="text" class="form-control @error('login') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Email или телефон" name="login">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword2" placeholder="Пароль" name="password">
            <a href="{{ route('password.request') }}">Восстановить пароль</a>
        </div>
        <div class="form-btn">
            <input type="submit" id="loginBtn" class="btn btn-primary disabled" value="Войти"/>
            <p>Нет аккаунта? <a href="{{ route('register') }}">Регистрация</a></p>
        </div>

    </form>


    <footer>
        <p>© Центр олимпиадного движенияг. Москва, 101000, ул. Жуковского, д.16 Телефон: 8 (495) 625 59 80 Fcod@edu.gov.ru</p>
        <p>Региональный школьный технопарк является оператором</p>
    </footer>


    <div class="bg-element">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>

            document.addEventListener('DOMContentLoaded', function () {
                var emailInput = document.getElementById('exampleFormControlInput1');
                var passwordInput = document.getElementById('inputPassword2');
                var loginBtn = document.getElementById('loginBtn');

                // Добавляем обработчик события для полей ввода
                emailInput.addEventListener('input', checkInputs);
                passwordInput.addEventListener('input', checkInputs);

                function checkInputs() {
                    // Проверяем, заполнены ли оба поля
                    var emailValue = emailInput.value.trim();
                    var passwordValue = passwordInput.value.trim();

                    if (emailValue !== '' && passwordValue !== '') {
                        // Если оба поля заполнены, разблокируем кнопку
                        loginBtn.classList.remove('disabled');
                    } else {
                        // Если хотя бы одно поле пусто, блокируем кнопку
                        loginBtn.classList.add('disabled');
                    }
                }
            });

        const handleMouseMove = (event) => {
            const x = event.clientX;
            const y = event.clientY;


            if (x && y) {
                const centerX = window.innerWidth / 2;
                const centerY = window.innerHeight / 2;
                const bgElement = document.querySelector('.bg-element');

                const distanceToCenter = Math.sqrt((x - centerX) ** 2 + (y - centerY) ** 2);
                const maxDistance = Math.sqrt(centerX ** 2 + centerY ** 2);
                const gradientSize = 20 + (distanceToCenter / maxDistance) * 100;

                // Установка стилей для .bg-element
                bgElement.style.setProperty('--x', `${x}px`);
                bgElement.style.setProperty('--y', `${y}px`);
                bgElement.style.setProperty('--size', `${gradientSize}%`);

                // Установка прозрачности для .bg-element
                bgElement.style.opacity = '0.3';
            }
        };

        document.addEventListener('mousemove', handleMouseMove);

        var emailInput = document.getElementById('exampleFormControlInput1');
        var passwordInput = document.getElementById('inputPassword2');

        emailInput.addEventListener("change", function () {
            this.classList.remove("is-invalid");
        });

        passwordInput.addEventListener("change", function () {
            this.classList.remove("is-invalid");
        });

        </script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
        </script>


</body>
</html>
