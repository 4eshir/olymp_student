<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test Form</title>
</head>
<body>

<form class="mainform" method="POST" action="{{ route('profileBase') }}">
    @csrf
    <h2>Что-то редактируем</h2>
    <div class="form-field">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_id" value="{{ $model->id }}" />

        <input name="name" type="text" class="form-control" id="nameInput" placeholder="Имя"/>
        <input name="birthdate" type="date" class="form-control" id="birthdateInput" placeholder="Дата рождения"/>

    </div>

    <div class="form-btn">
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </div>
</form>

</body>
</html>
