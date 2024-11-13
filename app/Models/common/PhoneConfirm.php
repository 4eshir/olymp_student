<?php

namespace App\Models\common;

class PhoneConfirm
{
    public $phone;
    public $standardCode;
    public $userCode;

    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    public function setStandardCode($code)
    {
        $this->standardCode = $code;
    }

    public function checkCode()
    {
        return $this->standardCode == $this->userCode;
    }
}
