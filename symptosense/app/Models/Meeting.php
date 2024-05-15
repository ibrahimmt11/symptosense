<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_diagnosis',
        'meeting_link',	
        'status',
        'scheduled_time',
    ];
}
