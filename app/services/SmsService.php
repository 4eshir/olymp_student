<?php

namespace App\services;

use Illuminate\Support\Facades\Cache;

class SmsService
{
    // Время жизни сообщения в секундах (в кэше и для повторной отправки)
    const SMS_LIFETIME = 30;

    public static function sendSms($phone)
    {
        if (Cache::has("code:{$phone}") == 1) {
            return 0;
        }

        $apiSendUrl = 'https://gkalashnik@schooltech.ru:' . config('app.params.smsApiKey') . '@gate.smsaero.ru/v2/sms/send';
        $code = mt_rand(1000, 9999);

        Cache::put("code:{$phone}", $code, self::SMS_LIFETIME);
        //$url = "$apiSendUrl?number=$phone&text=Ваш код: $code&sign=SMS Aero";
        $params = [
            'number' => $phone,
            'text' => "Ваш код: $code",
            'sign' => 'SMS Aero',
        ];

        $smsAeroMessage = new \SmsAero\SmsAeroMessage(config('app.params.smsApiLogin'), config('app.params.smsApiKey'));
        $response = $smsAeroMessage->send($params);

        return $code;
    }

    public static function convertPhoneNumber($phone)
    {
        $phone = preg_replace('/\D/', '', $phone);

        if (strlen($phone) === 11 && $phone[0] === '8') {
            return '7' . substr($phone, 1);
        }

        return null;
    }
}
