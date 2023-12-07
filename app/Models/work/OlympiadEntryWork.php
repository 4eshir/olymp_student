<?php

namespace App\Models\work;

use App\Models\common\OlympiadEntry;
use App\Models\temporary\ChildrenEvent;

class OlympiadEntryWork extends OlympiadEntry
{
    protected $guarded = [];

    public function childrenEvent()
    {
        return $this->hasOne(ChildrenEvent::class, 'id', 'children_event_id');
    }
}
