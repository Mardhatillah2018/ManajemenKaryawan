<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_jabatan', 'gaji_pokok'];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function gajis()
    {
        return $this->hasMany(Gaji::class);
    }
}

