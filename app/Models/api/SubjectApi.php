<?php

namespace App\Models\api;

use App\Models\common\Municipality;
use App\Models\temporary\Event;
use App\Models\temporary\Subject;
use App\Models\work\MunicipalityWork;
use App\Models\work\OlympiadEntryWork;

class SubjectApi extends Subject
{
    protected $guarded = [];
    public $timestamps = false;
    protected $connection = 'mysql_api';
}
