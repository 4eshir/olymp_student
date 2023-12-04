<?php

namespace App\Models\temporary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';
    public $timestamps = false;

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}
