<?php

namespace App\Models\api;

use App\Models\common\EducationalInstitution;
use App\Models\work\EducationalInstitutionWork;
use App\Models\work\MunicipalityWork;

class EducationalInstitutionWorkApi extends EducationalInstitutionWork
{
    protected $guarded = [];
    public $timestamps = false;
    protected $connection = 'mysql_api';
}
