<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    //
    use HasFactory;
    
    protected $table = 'sites';
    protected $fillable = ['nama_site', 'lokasi_fisik'];

    // Relasi: Satu Site punya banyak Karyawan
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'site_id');
    }
}
