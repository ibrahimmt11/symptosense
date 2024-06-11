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
        'profile_picture',
        'bukti_str',
        
    ];

    // In Dokter model
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');  // Adjust foreign and local keys as appropriate
    }

}
