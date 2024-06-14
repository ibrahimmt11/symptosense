<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pasien;

class Gejala extends Model
{
    use HasFactory;
    protected $table = 'gejala';
    protected $id_primary = 'id_gejala';
    protected $fillable = ['id_pasien','nama_gejala', 'dataset', 'status'];

    public function pasien()
    {
        return $this->belongsTo(pasien::class, 'id_pasien', 'id_pasien');
    }
}
