<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/profile.css">

    <title>Test Form</title>
</head>
<body>

@if ($model->email_verified_at !== null)

    <form class="mainform" method="POST" action="{{ route('createEntry') }}">
        @csrf
        <h2>Записываемся на олимпиаду</h2>
        <div class="form-field">

            <select name="participationClass" id="classInput">
                <option disabled>Выберите класс</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
            </select>

        </div>

        <div class="form-btn">
            <button class="btn btn-primary" type="submit">Записаться</button>
        </div>
    </form>

@else

    <form method="POST" class="verification_info_danger" action="{{ route('verification.send') }}">
        @csrf
        <span class="verification_text lead">Ваша учетная запись не подтверждена. Вам недоступна запись на олимпиаду.<br>
            Для подтверждения учетной записи следуйте инструкциям из письма, направленного на указанный Вами e-mail<br>
            Если Вы указали ошибочный e-mail - перейдите в профиль, отредактируйте данные и запросите письмо повторно
        </span>
    </form>

@endif

</body>
</html>
