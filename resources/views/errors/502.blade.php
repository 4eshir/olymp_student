@extends('errors.error', [
    'title' => 'Вероятно, серверу сейчас плохо. Ожидаем его скорейшего выздоровления...&#128138;',
    'errorCode' => '502',
    'homeLink' => route('default'),
    'buttonText' => 'Вернуться на главную'
])
