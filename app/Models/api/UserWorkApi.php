<?php

namespace App\Models\api;

use App\Models\common\Municipality;
use App\Models\temporary\Event;
use App\Models\work\EducationalInstitutionWork;
use App\Models\work\MunicipalityWork;
use App\Models\work\OlympiadEntryWork;
use App\Models\work\UserWork;

class UserWorkApi extends UserWork
{
    protected $guarded = [];
    public $timestamps = false;
    protected $connection = 'mysql_api';

    public function municipality()
    {
        return $this->hasOne(MunicipalityWorkApi::class, 'id', 'municipality_id');
    }

    public function educational()
    {
        return $this->hasOne(EducationalInstitutionWorkApi::class, 'id', 'educational_institution_id');
    }
}
