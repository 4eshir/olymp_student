<?php

namespace App\Models\temporary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildrenEvent extends Model
{
    use HasFactory;

    protected $table = 'children_event';
    public $timestamps = false;

    public function event()
    {
        return $this->hasOne(Event::class, 'id', 'event_id');
    }

    public function classT()
    {
        return $this->hasOne(ClassT::class, 'id', 'class_id');
    }
}
