<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'jenis_kelamin',
        'tgl_lahir',
        'no_telp',
        'email',
        'alamat',
        'bukti_str',
    ];
}
