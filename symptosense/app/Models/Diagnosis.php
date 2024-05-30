<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $table = 'diagnosis'; // Specify your table name if it's not the default naming
    protected $fillable = ['id_pasien', 'nama_diagnosis', 'hasil_diagnosis', 'id_dokter', 'status', 'dokumen', 'created_at', 'updated_at', 'gejala_terpilih']; 

}
