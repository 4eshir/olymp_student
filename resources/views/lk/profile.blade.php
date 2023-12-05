<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/notifications.css">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">

    <style>
        /* Ваши стили для выделения выбранных дат */
        .datepicker-dropdown .datepicker-days .active,
        .datepicker-dropdown .datepicker-months .active,
        .datepicker-dropdown .datepicker-years .active {
            background: linear-gradient(180deg, #1197D5 0%, #1197D5 100%) !important; /* Цвет выделения (замените на ваш желаемый цвет) */
            color: #ffffff; /* Цвет текста в выделенной ячейке (замените на ваш желаемый цвет) */
        }
    </style>
</head>
<body>



<header class="header_mobile">
    <div>
        <img class = "vsohlogo" src="./img/logo_goriz_color.svg" alt="" />
        <img class= "citylogo" src="./img/Frame 9191.svg" alt="" />
    </div>
    <div class="burger_btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M4 6.02632C4 5.4595 4.44772 5 5 5H19C19.5523 5 20 5.4595 20 6.02632C20 6.59313 19.5523 7.05263 19 7.05263H5C4.44772 7.05263 4 6.59313 4 6.02632ZM4 11.5C4 10.9332 4.44772 10.4737 5 10.4737H19C19.5523 10.4737 20 10.9332 20 11.5C20 12.0668 19.5523 12.5263 19 12.5263H5C4.44772 12.5263 4 12.0668 4 11.5ZM4 16.9737C4 16.4069 4.44772 15.9474 5 15.9474H19C19.5523 15.9474 20 16.4069 20 16.9737C20 17.5405 19.5523 18 19 18H5C4.44772 18 4 17.5405 4 16.9737Z" fill="#383C3F"/>
        </svg>
    </div>
</header >

<div class="burger animate__animated animate__fadeInDown " style="display: none;">

    <div class="btn-line">
        <div class="burger_btn_close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18.3002 5.70998C18.2077 5.61728 18.0978 5.54373 17.9768 5.49355C17.8559 5.44337 17.7262 5.41754 17.5952 5.41754C17.4643 5.41754 17.3346 5.44337 17.2136 5.49355C17.0926 5.54373 16.9827 5.61728 16.8902 5.70998L12.0002 10.59L7.11022 5.69998C7.01764 5.6074 6.90773 5.53396 6.78677 5.48385C6.6658 5.43375 6.53615 5.40796 6.40522 5.40796C6.27429 5.40796 6.14464 5.43375 6.02368 5.48385C5.90272 5.53396 5.79281 5.6074 5.70022 5.69998C5.60764 5.79256 5.5342 5.90247 5.4841 6.02344C5.43399 6.1444 5.4082 6.27405 5.4082 6.40498C5.4082 6.53591 5.43399 6.66556 5.4841 6.78652C5.5342 6.90749 5.60764 7.0174 5.70022 7.10998L10.5902 12L5.70022 16.89C5.60764 16.9826 5.5342 17.0925 5.4841 17.2134C5.43399 17.3344 5.4082 17.464 5.4082 17.595C5.4082 17.7259 5.43399 17.8556 5.4841 17.9765C5.5342 18.0975 5.60764 18.2074 5.70022 18.3C5.79281 18.3926 5.90272 18.466 6.02368 18.5161C6.14464 18.5662 6.27429 18.592 6.40522 18.592C6.53615 18.592 6.6658 18.5662 6.78677 18.5161C6.90773 18.466 7.01764 18.3926 7.11022 18.3L12.0002 13.41L16.8902 18.3C16.9828 18.3926 17.0927 18.466 17.2137 18.5161C17.3346 18.5662 17.4643 18.592 17.5952 18.592C17.7262 18.592 17.8558 18.5662 17.9768 18.5161C18.0977 18.466 18.2076 18.3926 18.3002 18.3C18.3928 18.2074 18.4662 18.0975 18.5163 17.9765C18.5665 17.8556 18.5922 17.7259 18.5922 17.595C18.5922 17.464 18.5665 17.3344 18.5163 17.2134C18.4662 17.0925 18.3928 16.9826 18.3002 16.89L13.4102 12L18.3002 7.10998C18.6802 6.72998 18.6802 6.08998 18.3002 5.70998Z" fill="#383C3F"/>
            </svg>
        </div>
    </div>

    <div class='mainnav'>
        <a>
            Главная
        </a>
        <a class="active" href="{{ route('default') }}">
            Профиль
        </a>
        <a>
            Мои олимпиады
        </a>
        <a>
            Список олимпиад
        </a>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout" style="border: 0">
            Выход
        </button>
    </form>
</div>

<header class="header_desktop">
    <img class = "vsohlogo" src="./img/logo_goriz_color.svg" alt="" />
    <img class= "citylogo" src="./img/Frame 9191.svg" alt="" />
</header>

<div class='profile'>
    <form method="POST" action="{{ route('logout') }}" class="navbar">
        @csrf
        {{--<div class='navbar'>--}}
            <div class='mainnav'>
                {{--<a>
                    Главная
                </a>--}}
                <a class="active" href="{{ route('default') }}">
                    Профиль
                </a>
                <a href="{{ route('entry') }}">
                    Мои олимпиады
                </a>
                <a>
                    Список олимпиад
                </a>
            </div>

            <button type="submit" class="logout" style="border: 0">
                Выход
            </button>

        {{--</div>--}}
    </form>

    <div class='section animate__animated animate__fadeIn'>

        @if ($model->email_verified_at == null)
            <form method="POST" class="verification_info" action="{{ route('verification.send') }}">
                @csrf
                <p class="verification_text">Ваша учетная запись не подтверждена. На указанную электронную почту было направлено письмо для подтверждения.<br>
                    Если Вы указали неверный адрес - измените его в своем профиле и нажмите на кнопку ниже</p>
                <input type="submit" class="btn btn-warning" value="Отправить письмо с подтверждением еще раз">
            </form>
        @endif

        @if (!$model->completed())
            <div class='verification_info'>
                <p class="verification_text" style="margin-bottom: 0">
                    Чтобы участвовать в олимпиаде заполните все данные
                </p>
            </div>
        @endif

        <div class='name_section'>
            <div class='name'>
                <h3>{{ ($model->name ? $model->name : '---').' '.($model->surname ? $model->surname : '---').' '.($model->patronymic ? $model->patronymic : '---') }}</h3>
                <?php
                    $arr = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];
                ?>

                <p @if (!$model->checkAge()) style="color: red" @endif>
                    Дата рождения: {{ date("d", strtotime($model->birthdate)).' '.$arr[(int)(date("m", strtotime($model->birthdate))) - 1].' '.date("Y", strtotime($model->birthdate)) }}
                    @if (!$model->checkAge())
                        <br>
                        <br>
                        <i>Ваш возраст не может быть меньше 10 и больше 18 лет</i>
                    @endif
                </p>

            </div>
            <a href="{{ route('profileEditCommon') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="edit_icon_blue">
                    <path d="M9.243 18.996H21V20.996H3V16.754L12.9 6.85403L17.142 11.097L9.242 18.997L9.243 18.996ZM14.313 5.44003L16.435 3.31903C16.6225 3.13156 16.8768 3.02625 17.142 3.02625C17.4072 3.02625 17.6615 3.13156 17.849 3.31903L20.678 6.14703C20.8655 6.33456 20.9708 6.58887 20.9708 6.85403C20.9708 7.1192 20.8655 7.3735 20.678 7.56103L18.556 9.68303L14.314 5.44003H14.313Z" fill="#024566" fill-opacity="0.1"/>
                </svg>
            </a>
        </div>

        <div class='contacts'>
            <div class='title'>
                <h4>Контакты</h4>
                <a href="{{ route('profileEditContact') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="edit_icon_gray">
                        <path d="M9.243 18.996H21V20.996H3V16.754L12.9 6.85403L17.142 11.097L9.242 18.997L9.243 18.996ZM14.313 5.44003L16.435 3.31903C16.6225 3.13156 16.8768 3.02625 17.142 3.02625C17.4072 3.02625 17.6615 3.13156 17.849 3.31903L20.678 6.14703C20.8655 6.33456 20.9708 6.58887 20.9708 6.85403C20.9708 7.1192 20.8655 7.3735 20.678 7.56103L18.556 9.68303L14.314 5.44003H14.313Z" fill="#383C3F" fill-opacity="0.1"/>
                    </svg>
                </a>
            </div>

            <div class='info'>
                <div class='tel'>
                    <span>Номер телефона</span>
                    <p>+{{ (int)(substr($model->phone_number, 0, 1) - 1).' ('.substr($model->phone_number, 1, 3).') '.substr($model->phone_number, 4, 3).' '.substr($model->phone_number, 7, 2).' '.substr($model->phone_number, 9) }}</p>
                </div>
                <div class='email'>
                    <span>Email</span>
                    <p>{{ $model->email }}</p>
                </div>

            </div>
        </div>

        <div class='personaldata'>

            <div class='title'>
                <h4>Персональные данные</h4>
                <a href="{{ route('profileEditSpecial') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="edit_icon_gray">
                        <path d="M9.243 18.996H21V20.996H3V16.754L12.9 6.85403L17.142 11.097L9.242 18.997L9.243 18.996ZM14.313 5.44003L16.435 3.31903C16.6225 3.13156 16.8768 3.02625 17.142 3.02625C17.4072 3.02625 17.6615 3.13156 17.849 3.31903L20.678 6.14703C20.8655 6.33456 20.9708 6.58887 20.9708 6.85403C20.9708 7.1192 20.8655 7.3735 20.678 7.56103L18.556 9.68303L14.314 5.44003H14.313Z" fill="#383C3F" fill-opacity="0.1"/>
                    </svg>
                </a>
            </div>

            <div class='info'>
                <div class='raion'>
                    <span>Район</span>
                    <p>{{ $model->municipality_id ? $model->municipality->name : '---' }}</p>
                </div>

                <div class='school'>
                    <span>Школа</span>
                    <p>{{ $model->educational_institution_id ? $model->educational->name : '---' }}</p>
                </div>

                <div class='grade_real'>
                    <span>Класс обучения</span>
                    <p>{{ $model->class ? $model->class : '---' }}</p>
                </div>

                <div class='grade'>
                    <span>Адрес проживания</span>
                    <p>{{ $model->address ? $model->address : '---' }}</p>
                </div>

            </div>
        </div>
    </div>
    <div class='Column'></div>
</div>

<footer>
    <p>© Центр олимпиадного движения г. Москва, 101000, ул. Жуковского, д.16 Телефон: 8 (495) 625 59 80 Fcod@edu.gov.ru</p>
    <p>Региональный школьный технопарк является оператором</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Initialize the datepicker -->
<script>
    var burgerBtn = document.querySelector('.burger_btn');
    var burgerBtn2 = document.querySelector('.burger_btn_close');
    var burgerMenu = document.querySelector('.burger');

    document.addEventListener('DOMContentLoaded', function() {
        burgerBtn.addEventListener('click', function() {
            // Переключение отображения блока
            burgerMenu.style.display = 'flex';
        });
        burgerBtn2.addEventListener('click', function() {
            // Переключение отображения блока
            burgerMenu.style.display = 'none';
        });
    });

    function handleResize() {
        if ((window.innerWidth > 768) && (burgerMenu.style.display == 'flex')) {
            burgerMenu.style.display = 'none';
        }
    };

    handleResize();
    window.addEventListener('resize', handleResize);
</script>


</body>
</html>
