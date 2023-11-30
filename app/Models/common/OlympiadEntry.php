<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlympiadEntry extends Model
{
    use HasFactory;

    protected $table = 'olympiad_entry';
    public $timestamps = false;
}
