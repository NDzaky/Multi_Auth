<?php

// app/Models/Devisi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devisi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_devisi'];

    public function pegawais()
    {
        return $this->belongsToMany(Pegawai::class, 'devisi_pegawai');
    }
}
