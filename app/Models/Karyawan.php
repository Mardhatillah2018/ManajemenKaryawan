<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'email',
        'nohp',
        'tgl_masuk',
        'departemen_id',
        'jabatan_id',
        'alamat'
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}

