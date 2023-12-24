<?php

namespace App\Models\api;

use App\Models\common\Municipality;
use App\Models\work\MunicipalityWork;
use App\Models\work\OlympiadEntryWork;
use App\Models\work\WarrantInvolvementWork;

class OlympiadEntryWorkApi extends OlympiadEntryWork
{
    protected $guarded = [];
    public $timestamps = false;
    protected $connection = 'mysql_api';

    public function childrenEvent()
    {
        return $this->hasOne(ChildrenEventApi::class, 'id', 'children_event_id');
    }

    public function user()
    {
        return $this->hasOne(UserWorkApi::class, 'id', 'user_id');
    }

    public function warrant()
    {
        return $this->hasOne(WarrantInvolvementWork::class, 'id', 'warrant_involvement_id');
    }
}
