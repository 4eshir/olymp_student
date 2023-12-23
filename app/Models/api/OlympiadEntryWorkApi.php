<?php

namespace App\Models\api;

use App\Models\common\Municipality;
use App\Models\work\MunicipalityWork;
use App\Models\work\OlympiadEntryWork;

class OlympiadEntryWorkApi extends OlympiadEntryWork
{
    protected $guarded = [];
    public $timestamps = false;
    protected $connection = 'mysql_api';
}
