<?php

namespace App\Models\temporary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlympiadEntry extends Model
{
    use HasFactory;

    protected $table = 'olympiad_entry';
    public $timestamps = false;

    public function childrenEvent()
    {
        return $this->hasOne(ChildrenEvent::class, 'id', 'children_event_id');
    }
}
