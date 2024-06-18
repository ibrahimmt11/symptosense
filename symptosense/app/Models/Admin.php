<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'admin';

    // Define the primary key
    protected $primaryKey = 'id_admin';

    // Specify if the IDs are auto-incrementing
    public $incrementing = true;

    // Specify the data type of the primary key
    protected $keyType = 'int';

    // Disable timestamps if the table doesn't have created_at and updated_at columns
    public $timestamps = true;

    // Define the fillable attributes
    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'tgl_lahir',
        'no_telp',
        'email',
        'alamat',
        'created_at',
        'updated_at',
        'user_id'
    ];

    // Define the relationship to the User model, if applicable
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
