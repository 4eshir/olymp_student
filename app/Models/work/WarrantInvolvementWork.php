<?php

namespace App\Models\work;

use App\Models\common\OlympiadEntry;
use App\Models\common\WarrantInvolvement;
use App\Models\temporary\ChildrenEvent;

class WarrantInvolvementWork extends WarrantInvolvement
{
    protected $guarded = [];

    public $temp = '';

}
