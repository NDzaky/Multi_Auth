<?php
// App\Models\Pegawai.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'company_id',
        'email',
        'nomor',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function devisis()
    {
        return $this->belongsToMany(Devisi::class, 'devisi_pegawai');
    }
}
