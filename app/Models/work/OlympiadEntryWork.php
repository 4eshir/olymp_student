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

    public function user()
    {
        return $this->hasOne(UserWork::class, 'id', 'user_id');
    }

    public function prettyStatus()
    {
        $strStatus = '';
        if ($this->status == null) $strStatus = '<span style="color: #ff9900">Не рассмотрена</span>';
        if ($this->status === 0) $strStatus = '<span style="color: red">Отклонена</span>';
        if ($this->status === 1) $strStatus = '<span style="color: green">Одобрена</span>';
        return $strStatus;
    }
}
