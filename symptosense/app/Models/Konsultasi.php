<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';

    protected $fillable = [
        'id_konsultasi',
        'id_dokter',
        'id_pasien',
        'id_diagnosis',
        'hasil_konsul',
        'status',
        'created_at',
        'updated_at',				
    ];
}
