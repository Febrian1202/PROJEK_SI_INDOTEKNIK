<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    /** @use HasFactory<\Database\Factories\KaryawanFactory> */
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'kandidat_id', 'lamaran_id', 'nik_karyawan', 
        'site_id', 'tgl_bergabung', 'status_karyawan'
    ];

    public function kandidat()
    {
        return $this->belongsTo(KandidatProfil::class, 'kandidat_id');
    }

    public function lamaranAsal()
    {
        return $this->belongsTo(Lamaran::class, 'lamaran_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}
