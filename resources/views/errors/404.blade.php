@extends('errors.error', [
    'title' => 'Вы как сюда попали? Здесь ничего нет &#128466;',
    'errorCode' => '404',
    'homeLink' => route('default'),
    'buttonText' => 'Вернуться на главную'
])
