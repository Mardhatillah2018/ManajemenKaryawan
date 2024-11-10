<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $fillable = [
        'karyawan_id',
        'jabatan_id',
        'departemen_id',
        'bonus',
        'potongan',
        'total_gaji',
        'bulan_tahun',
        'status',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

}
