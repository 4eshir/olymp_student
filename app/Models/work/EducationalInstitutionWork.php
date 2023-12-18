<?php

namespace App\Models\work;

use App\Models\common\EducationalInstitution;

class EducationalInstitutionWork extends EducationalInstitution
{
    protected $guarded = [];
    public $timestamps = false;

    public function jurisdiction()
    {
        return $this->hasOne(MunicipalityWork::class, 'id', 'jurisdiction_id');
    }
}
