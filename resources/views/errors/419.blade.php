@extends('errors.error', [
    'title' => 'Возможно, истекло время Вашего сеанса. Вернитесь назад и обновите страницу. Если ошибка не исчезла - таков путь &#128549;',
    'errorCode' => '419',
    'homeLink' => route('login'),
    'buttonText' => 'Вернуться назад'
])