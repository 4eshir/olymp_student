@extends('errors.error', [
    'title' => 'Кажется, на сервер повысилась нагрузка. Попробуйте еще раз через несколько минут &#128340;',
    'errorCode' => '500',
    'homeLink' => route('default'),
    'buttonText' => 'Вернуться на главную'
])
