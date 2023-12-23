<?php

namespace App\Models\api;

use App\Models\common\Municipality;
use App\Models\temporary\ChildrenEvent;
use App\Models\temporary\Event;
use App\Models\work\MunicipalityWork;
use App\Models\work\OlympiadEntryWork;

class ChildrenEventApi extends ChildrenEvent
{
    protected $guarded = [];
    public $timestamps = false;
    protected $connection = 'mysql_api';
}
