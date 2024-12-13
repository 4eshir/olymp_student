{{--<form class='mainform_profile' method="POST" action="{{ route('profileRequestCommon') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    @csrf
    <h2>Запись на олимпиаду</h2>
    <div class="form-field">

        <select class="form-select" name="participationClass" id="classInput">
            <option disabled>Выберите класс</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
        </select>

    </div>

    <div class="form-btn">
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </div>
</form>--}}




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои олимпиады</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="./css/auth/index.css">
    <link rel="stylesheet" href="./css/auth/ProfileForms.css">
    <link rel="stylesheet" href="./css/auth/profile.css">
    <link rel="stylesheet" href="./css/notifications.css">
    <link rel="stylesheet" href="./css/modal_window.css">
    <link rel="stylesheet" href="./css/entry.css">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">


    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>

<script
    src="https://code.jquery.com/jquery-3.6.3.js"
    integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous">
</script>

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
        <a href="{{ route('default') }}">
            Профиль
        </a>
        <a class="active" href="{{ route('entry') }}">
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
    <img class = "vsohlogo" src="./img/logo_goriz_color.svg" alt="" />
    <img class= "citylogo" src="./img/Frame 9191.svg" alt="" />
</header>

<div class='profile'>

    <form method="POST" action="{{ route('logout') }}" class="navbar">
        @csrf
        {{--<div class='navbar'>--}}
        <div class='mainnav'>
            <a href="{{ route('default') }}">
                Профиль
            </a>
            <a class="active" href="{{ route('entry') }}">
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
        @if ($model->completed())
            <div class="verification_success">
                <p class="verification_text">
                    <b>Шаг 5. Заполните форму, и подайте заявку на региональный этап по выбранному Вами предмету</b>
                </p>
                <p>Заполните все поля формы и нажмите кнопку "Подать заявку на участие".</p>
                <p>Убедитесь что поданная заявка отображается в блоке "Мои олимпиады" (ниже, под кнопкой "Подать заявку на участие").</p>
            </div>

                <div class='title'>
                    <h4>Форма заявки на участие в региональном этапе ВсОШ</h4>
                </div>

                <form class='mainform_profile' method="POST" action="{{ route('createEntry') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    @csrf

                    <div class="form-field">

                        <label>Предмет</label>
                        <select class="form-select" name="subject" id="classInput1">
                            <option value="" selected>Выберите предмет</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-field">

                        <label>Класс участия в олимпиаде</label>
                        <select class="form-select" name="participationClass" id="classInput2"></select>

                    </div>

                    <div class="form-field">

                        <label>Обоснование участия</label>
                        <select class="form-select" name="warrant" id="classInput3">
                            <option value="" selected>Выберите обоснование участия</option>
                            @foreach($warrants as $warrant)
                                <option value="{{ $warrant->id }}">{{ $warrant->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <img id="loader" src="{{url('/images/ajax-loader.gif')}}" alt="loader">

                    <div class="form-btn">
                        <button class="btn btn-primary" type="submit">Подать заявку на участие</button>
                    </div>
                </form>

                @if (\Illuminate\Support\Facades\Session::has('flash_message'))
                    <div class="modalBackground">
                        <div class="modalActive">
                            <div class="modalClose">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="edit_icon_gray">
                                    <path d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z" fill="#383C3F" fill-opacity="0.4"/>
                                </svg>
                            </div>
                            <div class="modalWindow">
                                {!! \Illuminate\Support\Facades\Session::get('flash_message')  !!}
                            </div>
                        </div>
                    </div>
                @endif


            <div hidden class="verification_success">
                <p class="verification_text">
                    Регистрация на региональный этап Всероссийской Олимпиады школьников 2024/2025 завершена.
                </p>
                <p class="verification_text">
                    Ожидайте рассмотрения своих заявок (результаты в таблице ниже).
                </p>
            </div>

            <div class='title'>
                <h4>Мои олимпиады</h4>
            </div>
            <div class="entry-back">
                {{--<table class="table table-responsive">
                    <tr>
                        <th>Предмет</th>
                        <th>Класс участия</th>
                        <th>Номер тура</th>
                        <th>Дата и время проведения</th>
                        <th>Адрес проведения</th>
                        <th></th>
                    </tr>--}}
                    <?php $c = 0 ?>
                    @foreach($entries as $entry)
                        <?php $c++ ?>
                        <div class="main-entry">

                            <div class="vertical-compose">
                                <div class="top-compose">
                                    <span class="primary">{{ $entry->subject }}</span>
                                </div>
                                <div class="down-compose">
                                    <span class="primary">{{ $entry->tour }} тур</span>
                                </div>
                            </div>

                            <div class="address-entry">
                                <span>{{ $entry->shortAddress(50) }}</span>
                            </div>

                            <div class="vertical-compose">
                                <div class="top-compose">
                                    {{ $entry->olymp_date }}
                                </div>
                                <div class="down-compose">
                                    {{ $entry->olymp_time }}
                                </div>
                            </div>

                            <div class="open">
                                <a data-bs-toggle="collapse" href="#target{{ $c }}">
                                    <img src="./img/open-img.png" height="30" width="30"/>
                                </a>
                            </div>
                        </div>

                        <div class="collapse full-info" id="target{{ $c }}">
                            <div class="entry-datetime">
                                <div class="description">Адрес проведения олимпиады</div>
                                <div class="data">{{ $entry->address }}</div>
                            </div>

                            <hr>

                            <div class="entry-datetime">
                                <div class="description">Дата окончания проверки работ</div>
                                <div class="data">{{ $entry->end_checked_work }}</div>
                            </div>

                            <div class="entry-datetime">
                                <div class="description">Дата объявления результатов</div>
                                <div class="data">{{ $entry->statement_points }}</div>
                            </div>

                            <div class="entry-datetime">
                                <div class="description">Дата и время показа работ</div>
                                <div class="data">{{ $entry->showing_works }}</div>
                            </div>
                            <div class="entry-address">
                                <div class="description">Адрес показа работ</div>
                                <div class="data">{{ $entry->address_showing_works }}</div>
                            </div>

                            <div class="entry-datetime">
                                <div class="description">Дата и время подачи заявлений на апелляцию</div>
                                <div class="data">{{ $entry->petition_appeal }}</div>
                            </div>
                            <div class="entry-address">
                                <div class="description">Адрес подачи заявлений на апелляцию</div>
                                <div class="data">{{ $entry->address_petition_appeal }}</div>
                            </div>

                            <div class="entry-datetime">
                                <div class="description">Дата и время проведения апелляции</div>
                                <div class="data">{{ $entry->appeal }}</div>
                            </div>
                            <div class="entry-address">
                                <div class="description">Адрес проведения апелляции</div>
                                <div class="data">{{ $entry->address_appeal }}</div>
                            </div>

                            <div class="entry-datetime">
                                <div class="description">Дата публикации результатов</div>
                                <div class="data">{{ $entry->publication }}</div>
                            </div>
                        </div>


                        {{--<tr>
                            <td>
                                {{ $entry->subject }}
                            </td>
                            <td>
                                {{ $entry->class }}
                            </td>
                            <td>
                                {{ $entry->tour }} тур
                            </td>
                            <td>
                                {{ $entry->datetime }}
                            </td>
                            <td>
                                {{ $entry->address }}
                            </td>
                            <td>
                                --}}{{--@if ($entry->status === null)
                                    <form method="POST" action="{{ route('deleteEntry') }}">
                                        @csrf
                                        <input type="hidden" name="entryId" value="{{ $entry->id }}"/>
                                        <button type="submit" class="btn btn-danger">Отменить заявку</button>
                                    </form>
                                @else--}}{{--
                                    <span style="color: red">Отмена заявки недоступна</span>
                                --}}{{--@endif --}}{{--
                            </td>

                        </tr>--}}
                    @endforeach
                {{--</table>--}}
            </div>



        @else

            <div class="verification_danger">
                <p class="verification_text">
                    Ваша учетная запись не подтверждена. Вам недоступна регистрация на региональный этап Всероссийсой олимпиады школьников.
                </p>
                <p class="verification_text" style="margin-bottom: 0">
                    Проверьте электронную почту, которую Вы указали при регистрации или следуйте инструкции в разделе "Профиль".
                </p>
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

<style>
    #loader {
        position: absolute;
        right: 18px;
        top: 30px;
        width: 20px;
    }
</style>
<script>
    $(function () {
        var loader = $('#loader'),
            category = $('select[name="subject"]'),
            subcategory = $('select[name="participationClass"]');

        loader.hide();
        subcategory.attr('disabled','disabled')

        subcategory.change(function(){
            var id = $(this).val();
            if(!id){
                subcategory.attr('disabled','disabled')
            }
        })

        category.change(function() {
            var id= $(this).val();
            if(id){
                loader.show();
                subcategory.attr('disabled','disabled')

                $.get('{{url('entry-dropdown-class-data?subject_id=')}}'+id)
                    .done(function(data){
                        var s='<option value="" selected>Выберите класс участия</option>';

                        console.log(data);

                        data = data["data"];
                        for (let i = 0; i < data[0].length; i++)
                        {
                            s +='<option value="'+data[1][i]+'">'+data[0][i]+'</option>'
                        }

                        subcategory.removeAttr('disabled');
                        subcategory.html(s);
                        loader.hide();
                    })
            }

        })
    })
</script>
<script src="{{ asset('js/lk/entry.js') }}"></script>
<script src="{{ asset('js/lk/modal.js') }}"></script>
</body>
</html>
