<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test Form</title>
</head>
<body>

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

</body>
</html>
