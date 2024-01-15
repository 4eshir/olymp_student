<?php

namespace App\Models\temporary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportantDates extends Model
{
    use HasFactory;

    protected $table = 'important_dates';
    public $timestamps = false;
}
