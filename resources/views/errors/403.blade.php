@extends('errors.error', [
    'title' => 'Вам сюда нельзя. Пожалуйста, уходите &#128694;',
    'errorCode' => '403',
    'homeLink' => route('default'),
    'buttonText' => 'Вернуться на главную'
])
