<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacations extends Model
{
    use HasFactory;
    protected $table = 'vacationes';
    protected $fillable = [

        'employ_id',
        'dep_id',
        'vacation_type',
        'from_day',
        'to_day',
        'vacation_purpoes',
        'mag_classes_aprove',
        'mag_department_aprove',
        'vacation_note',
    ];


}
