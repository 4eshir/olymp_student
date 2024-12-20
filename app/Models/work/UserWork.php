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
    public $edit = false;

    public function completed()
    {
        return $this->name !== null &&
            $this->surname != null &&
            $this->phone_number != null &&
            $this->email != null &&
            $this->birthdate != null &&
            $this->municipality_id != null &&
            $this->educational_institution_id != null &&
            $this->class != null
            && $this->checkAge();
    }

    public function checkAge()
    {
        $currentDate = new \DateTime(date("Y-m-d"));
        $diff = $currentDate->diff(new \DateTime($this->birthdate));

        return $diff->y >= 10 && $diff->y <= 18;
    }

    public function municipality()
    {
        return $this->hasOne(MunicipalityWork::class, 'id', 'municipality_id');
    }

    public function educational()
    {
        return $this->hasOne(EducationalInstitutionWork::class, 'id', 'educational_institution_id');
    }
}
