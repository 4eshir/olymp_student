<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantInvolvement extends Model
{
    use HasFactory;

    protected $table = 'warrant_involvement';
    public $timestamps = false;
}
