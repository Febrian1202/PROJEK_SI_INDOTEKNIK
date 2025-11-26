<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    /** @use HasFactory<\Database\Factories\PosisiFactory> */
    use HasFactory;

    protected $table = 'posisi';

    protected $fillable = ['nama_posisi', 'deskripsi', 'is_active'];

    // Relasi Many-to-Many ke MasterDokumen
    public function syaratDokumen()
    {
        return $this->belongsToMany(MasterDokumen::class, 'posisi_syarat_dokumen', 'posisi_id', 'dokumen_id')
            ->withPivot('is_mandatory')
            ->withTimestamps();
    }

    // Relasi ke Lamaran (One-to-Many)
    public function lamaran()
    {
        return $this->hasMany(Lamaran::class, 'posisi_id');
    }
}
