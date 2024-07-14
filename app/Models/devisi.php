<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_devisi',
        'anggota_id',
    ];

    public function anggota()
    {
        return $this->belongsTo(Pegawai::class, 'anggota_id');
    }
}
