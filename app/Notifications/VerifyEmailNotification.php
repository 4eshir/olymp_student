<?php


namespace App\Notifications;


use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class VerifyEmailNotification extends VerifyEmail
{
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Подтверждение аккаунта ВСоШ'))
            ->from('noreply@schooltech.ru')
            ->line(Lang::get('Нажмите на кнопку ниже, чтобы подтвердить свой e-mail'))
            ->action(Lang::get('Подтвердить e-mail'), $url);
    }
}
