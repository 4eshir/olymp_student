<?php

namespace App\Models\api;

use App\Models\common\Municipality;
use App\Models\temporary\Event;
use App\Models\work\MunicipalityWork;
use App\Models\work\OlympiadEntryWork;
use App\Models\work\UserWork;

class UserWorkApi extends UserWork
{
    protected $guarded = [];
    public $timestamps = false;
    protected $connection = 'mysql_api';
}
