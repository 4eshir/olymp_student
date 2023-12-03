<?php

namespace App\Models\work;

use App\Models\common\EducationalInstitution;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Auth;

class UserWork extends User
{
    protected $guarded = [];
    public $timestamps = false;

    public function municipality()
    {
        return $this->hasOne(MunicipalityWork::class, 'id', 'municipality_id');
    }

    public function educational()
    {
        return $this->hasOne(EducationalInstitution::class, 'id', 'educational_institution_id');
    }
}
