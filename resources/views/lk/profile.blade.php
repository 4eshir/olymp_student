<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal_window.css') }}">
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
<!-- t -->



<header class="header_mobile">
    <div>
        <img class = "vsohlogo" src="{{ asset('img/logo_goriz_color.svg') }}" alt="" />
        <img class= "citylogo" src="{{ asset('img/Frame 9191.svg') }}" alt="" />
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
        <a class="active" href="{{ route('default') }}">
            Профиль
        </a>
        <a href="{{ route('entry') }}">
            Мои олимпиады
        </a>
        <a href="https://disk.yandex.ru/i/iDliJHlGBbzKAA" style="color: red;">
            Видеоинструкция
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
    <img class = "vsohlogo" src="{{ asset('img/logo_goriz_color.svg') }}" alt="" />
    <img class= "citylogo" src="{{ asset('img/Frame 9191.svg') }}" alt="" />
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
                <a href="https://disk.yandex.ru/i/iDliJHlGBbzKAA" style="color: red;">
                    Видеоинструкция
                </a>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout" style="border: 0">
                    Выход
                </button>
            </form>

        {{--</div>--}}
    </form>

    <div class='section animate__animated animate__fadeIn'>

        @if ($model->email_verified_at == null)
            <form method="POST" class="verification_info" action="{{ route('verification.send') }}">
                @csrf
                <p class="verification_text"><b>Шаг 1. Подтвердите электронную почту</b></p>
                <p>    Если Вы указали неверный email при регистрации, перейдите в раздел редактирования контактов, укажите правильную электронную почту и подтвердите её.</p>
                <input type="submit" class="btn btn-warning" value="Повторная отправка письма с подтверждением">

                @if (Session::has('flash_message'))
                    {{ \Illuminate\Support\Facades\Session::get('flash_message') }}
                    <div class="modalBackground">
                        <div class="modalActive">
                            <div class="modalClose">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="edit_icon_gray">
                                    <path d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z" fill="#383C3F" fill-opacity="0.4"/>
                                </svg>
                            </div>
                            <div class="modalWindow">
                                <p>Письмо с подтверждением успешно отправлено!</p>
                                <div style="padding: 0 45% 5%">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="edit_icon_gray">
                                        <path d="M17.5821 6.95711C17.9726 6.56658 17.9726 5.93342 17.5821 5.54289C17.1916 5.15237 16.5584 5.15237 16.1679 5.54289L5.54545 16.1653L1.70711 12.327C1.31658 11.9365 0.683417 11.9365 0.292893 12.327C-0.0976311 12.7175 -0.097631 13.3507 0.292893 13.7412L4.83835 18.2866C5.22887 18.6772 5.86204 18.6772 6.25256 18.2866L17.5821 6.95711Z" fill="rgb(153, 215, 244)" fill-opacity="1"/>
                                        <path d="M23.5821 6.95711C23.9726 6.56658 23.9726 5.93342 23.5821 5.54289C23.1915 5.15237 22.5584 5.15237 22.1678 5.54289L10.8383 16.8724C10.4478 17.263 10.4478 17.8961 10.8383 18.2866C11.2288 18.6772 11.862 18.6772 12.2525 18.2866L23.5821 6.95711Z" fill="#002456" fill-opacity="0.8"/>
                                    </svg>
                                </div>
                                <p>Чтобы завершить процесс, перейдите по ссылке в письме.</p>
                                <p>Если Вы не получили письмо, выполните следующие действия:</p>
                                <p>1. Проверьте папки со спамом и массовыми рассылками.</p>
                                <p>2. Проверьте корректность введенного email-адреса.</p>
                            </div>
                        </div>
                    </div>
                @endif

            </form>
        @endif

        @if ($model->phone_verified_at == null)
            <form method="POST" class="verification_info" action="{{ route('phoneConfirm') }}">
                @csrf
                <input name="_phone" type="hidden" value="{{$model->phone_number}}"/>
                <p class="verification_text"><b>Шаг 2. Подтвердите личный номер телефона</b></p>
                <p>    Если Вы указали неверный телефон при регистрации, перейдите в раздел редактирования контактов, укажите правильный номер и подтвердите его.</p>
                <input type="submit" class="btn btn-warning" value="Отправить СМС с кодом подтверждения">
            </form>

            <div class='contacts'>
                <div class='title'>
                    <h4>Контакты</h4>
                    <a href="{{ route('profileEditContact') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="edit_icon_gray">
                            <path d="M9.243 18.996H21V20.996H3V16.754L12.9 6.85403L17.142 11.097L9.242 18.997L9.243 18.996ZM14.313 5.44003L16.435 3.31903C16.6225 3.13156 16.8768 3.02625 17.142 3.02625C17.4072 3.02625 17.6615 3.13156 17.849 3.31903L20.678 6.14703C20.8655 6.33456 20.9708 6.58887 20.9708 6.85403C20.9708 7.1192 20.8655 7.3735 20.678 7.56103L18.556 9.68303L14.314 5.44003H14.313Z" fill="#383C3F" fill-opacity="0.4"/>
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
        @else
            @if(session('success'))
                <div class="alert alert-success" style="width: 100%">
                    {{ session('success') }}
                </div>
            @endif

            @if (!$model->completed())
                <div class='verification_info'>
                    <p class="verification_text" style="margin-bottom: 0">
                        <b>Шаг 3. Заполните данные профиля: ФИО, дату рождения, район, школу и класс обучения</b>
                    </p><br>
                    <p>    После подачи заявки на олимпиаду изменить данные сведения будет невозможно. Будьте внимательны при сохранении данных.</p>
                </div>
            @endif

            @if ($model->completed())
                <div class='verification_success'>
                    <p class="verification_text" style="margin-bottom: 0">
                        <b>Шаг 4. Перейдите в раздел "Мои олимпиады"</b>
                    </p><br>
                    <p>    В разделе меню (в компьютерной версии меню расположено слева, в мобильной версии - наверху в раскрывающемся списке) найдите пункт "Мои олимпиады", чтобы подать заявку или просмотреть уже поданные заявки.</p>
                </div>
            @endif

            <div class='name_section'>
                <div class='name'>
                    <h3>{{ ($model->surname ? : '---').' '.($model->name ? : '---').' '.($model->patronymic ? : '---') }}</h3>
                    <?php
                        $arr = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];
                    ?>

                    <p @if (!$model->checkAge()) style="color: red" @endif>
                        Дата рождения: {{ $model->birthdate == null ? '' : date("d", strtotime($model->birthdate)).' '.$arr[(int)(date("m", strtotime($model->birthdate))) - 1].' '.date("Y", strtotime($model->birthdate)) }}
                        @if (!$model->checkAge())
                            <br>
                            <br>
                            <i>Ваш возраст не может быть меньше 10 и больше 18 лет</i>
                        @endif
                    </p>

                </div>
                <a href="{{ route('profileEditCommon') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="edit_icon_blue">
                        <path d="M9.243 18.996H21V20.996H3V16.754L12.9 6.85403L17.142 11.097L9.242 18.997L9.243 18.996ZM14.313 5.44003L16.435 3.31903C16.6225 3.13156 16.8768 3.02625 17.142 3.02625C17.4072 3.02625 17.6615 3.13156 17.849 3.31903L20.678 6.14703C20.8655 6.33456 20.9708 6.58887 20.9708 6.85403C20.9708 7.1192 20.8655 7.3735 20.678 7.56103L18.556 9.68303L14.314 5.44003H14.313Z" fill="#024566" fill-opacity="0.4"/>
                    </svg>
                </a>
            </div>

            <div class='contacts'>
                <div class='title'>
                    <h4>Контакты</h4>
                    <a href="{{ route('profileEditContact') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="edit_icon_gray">
                            <path d="M9.243 18.996H21V20.996H3V16.754L12.9 6.85403L17.142 11.097L9.242 18.997L9.243 18.996ZM14.313 5.44003L16.435 3.31903C16.6225 3.13156 16.8768 3.02625 17.142 3.02625C17.4072 3.02625 17.6615 3.13156 17.849 3.31903L20.678 6.14703C20.8655 6.33456 20.9708 6.58887 20.9708 6.85403C20.9708 7.1192 20.8655 7.3735 20.678 7.56103L18.556 9.68303L14.314 5.44003H14.313Z" fill="#383C3F" fill-opacity="0.4"/>
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
                    <a href="{{route('profileEditSpecial')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="edit_icon_gray">
                            <path d="M9.243 18.996H21V20.996H3V16.754L12.9 6.85403L17.142 11.097L9.242 18.997L9.243 18.996ZM14.313 5.44003L16.435 3.31903C16.6225 3.13156 16.8768 3.02625 17.142 3.02625C17.4072 3.02625 17.6615 3.13156 17.849 3.31903L20.678 6.14703C20.8655 6.33456 20.9708 6.58887 20.9708 6.85403C20.9708 7.1192 20.8655 7.3735 20.678 7.56103L18.556 9.68303L14.314 5.44003H14.313Z" fill="#383C3F" fill-opacity="0.4"/>
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

                </div>
            </div>
        @endif
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

<script src="{{ asset('js/lk/profile.js') }}"></script>
<script src="{{ asset('js/lk/modal.js') }}"></script>
</body>
</html>
