<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKeluhan extends Model
{
    use HasFactory;
    protected $table = 'jeniskeluhan';

    protected $fillable = [
        'nama_keluhan',
    ];
}
