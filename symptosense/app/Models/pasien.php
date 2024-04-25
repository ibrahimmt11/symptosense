<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'jenis_kelamin',
        'tgl_lahir',
        'no_telp',
        'email',
        'alamat',
        'tinggi_badan',
        'berat_badan',
        'NIK',
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
