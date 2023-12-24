<?php

namespace App\Models\work;

use App\Models\common\OlympiadEntry;
use App\Models\temporary\ChildrenEvent;

class OlympiadEntryWork extends OlympiadEntry
{
    protected $guarded = [];

    public $temp = '';

    public function childrenEvent()
    {
        return $this->hasOne(ChildrenEvent::class, 'id', 'children_event_id');
    }

    public function user()
    {
        return $this->hasOne(UserWork::class, 'id', 'user_id');
    }

    public function warrant()
    {
        return $this->hasOne(WarrantInvolvementWork::class, 'id', 'warrant_involvement_id');
    }

    public function prettyStatus()
    {
        $strStatus = '';
        if ($this->status == null) $strStatus = '<span style="color: #ff9900">Не рассмотрена</span>';
        if ($this->status === 0) $strStatus = '<span style="color: red">Отклонена</span>';
        if ($this->status === 1) $strStatus = '<span style="color: green">Одобрена</span>';
        return $strStatus;
    }

    public function getDisplayData()
    {
        $boobs1 = "boobs1";
        $boobs2 = "boobs2";
        return ["item1" => $boobs1, "item2" => $boobs2];
    }
}
