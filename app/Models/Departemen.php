<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $fillable = ['nama_departemen'];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function gajis()
    {
        return $this->hasMany(Gaji::class);
    }
}

