<?php

namespace App\Models\temporary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassT extends Model
{
    use HasFactory;

    protected $table = 'class';
    public $timestamps = false;

}
