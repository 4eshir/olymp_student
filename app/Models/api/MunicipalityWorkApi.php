<?php

namespace App\Models\api;

use App\Models\common\Municipality;
use App\Models\work\MunicipalityWork;

class MunicipalityWorkApi extends MunicipalityWork
{
    protected $guarded = [];
    public $timestamps = false;
    protected $connection = 'mysql_api';
}
