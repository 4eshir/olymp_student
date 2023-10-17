<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalInstitution extends Model
{
    use HasFactory;

    protected $table = 'educational_institution';
    public $timestamps = false;
}
