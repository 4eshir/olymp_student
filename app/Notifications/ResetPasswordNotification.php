<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPasswordNotification extends ResetPassword {
    protected function buildMailMessage($url) {
        return (new MailMessage)
            ->subject('Уведомление о сбросе пароля')
            ->from('vsosh@schooltech.ru')
            ->line(Lang::get('Вы получили это письмо, потому что отправили запрос на сброс пароля для вашей учетной записи в системе ВСоШ.'))
            ->action(Lang::get('Сбросить пароль'), $url)
            ->line(Lang::get('Срок действия ссылки для сброса пароля истечет через :count минут.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
            ->line(Lang::get('Если вы не запрашивали сброс пароля, проигнорируйте это письмо.'));
    }
}
