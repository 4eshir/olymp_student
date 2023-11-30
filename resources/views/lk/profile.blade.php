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

        <input name="name" type="text" class="form-control" id="nameInput" placeholder="Имя" value="{{ $model->name }}"/>
        <input name="surname" type="text" class="form-control" id="nameInput" placeholder="Имя" value="{{ $model->surname }}"/>
        <input name="patronymic" type="text" class="form-control" id="nameInput" placeholder="Имя" value="{{ $model->patronymic }}"/>
        <input name="birthdate" type="date" class="form-control" id="birthdateInput" placeholder="Дата рождения" value="{{ $model->birthdate }}"/>

    </div>

    <div class="form-btn">
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </div>
</form>

<br><br>

<form class="mainform" method="POST" action="{{ route('profileContact') }}">
    @csrf
    <h2>Еще то-то редактируем</h2>
    <div class="form-field">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_id" value="{{ $model->id }}" />

        <input name="phoneNumber" type="number" class="form-control" id="nameInput" placeholder="Номер телефона" value="{{ $model->phone_number }}"/>
        <input name="email" type="email" class="form-control" id="birthdateInput" placeholder="E-mail" value="{{ $model->email }}"/>

    </div>

    <div class="form-btn">
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </div>
</form>

<br><br>

<form class="mainform" method="POST" action="{{ route('profileSpecial') }}">
    @csrf
    <h2>Еще то-то редактируем</h2>
    <div class="form-field">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_id" value="{{ $model->id }}" />

        <select name="municipality" id="municipalityInput">
            <option disabled>Выберите район</option>
            @foreach ($municipalities as $one)
                echo '<option value="{{$one->id}}" {{ $model->municipality_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>';
            @endforeach
        </select>

        <select name="educational" id="educationalInput">
            <option disabled>Выберите учебное учреждение</option>
            @foreach ($educational as $one)
                echo '<option value="{{$one->id}}" {{ $model->educational_institution_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>';
            @endforeach
        </select>

        <select name="class" id="classInput">
            <option disabled>Выберите класс</option>
            <option value="7" {{ $model->class == 7 ? 'selected' : '' }}>7</option>
            <option value="8" {{ $model->class == 8 ? 'selected' : '' }}>8</option>
            <option value="9" {{ $model->class == 9 ? 'selected' : '' }}>9</option>
            <option value="10" {{ $model->class == 10 ? 'selected' : '' }}>10</option>
            <option value="11" {{ $model->class == 11 ? 'selected' : '' }}>11</option>
        </select>

        <input name="address" type="text" class="form-control" id="addressInput" placeholder="г. Астрахань, ул. Куликова, д 0, кв 0" value="{{ $model->address }}"/>

    </div>

    <div class="form-btn">
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </div>
</form>

</body>
</html>
