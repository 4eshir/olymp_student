<?php

namespace App\Models\work;

use App\Models\common\EducationalInstitution;

class EducationalInstitutionWork extends EducationalInstitution
{
    protected $guarded = [];
    public $timestamps = false;
    protected $connection = 'mysql';

    public function jurisdiction()
    {
        return $this->hasOne(MunicipalityWork::class, 'id', 'jurisdiction_id');
    }

    public function municipality()
    {
        return $this->hasOne(MunicipalityWork::class, 'id', 'municipality_id');
    }
}
