<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    use HasFactory;
    protected $table = 'verifikasi';

    protected $fillable = [
        'id_diagnosis',
        'nama_diagnosis',
        'hasil_diagnosis',
        'id_dokter',
        'status',
        'dokumen',
        'created_at',
        'updated_at',				
    ];
}
