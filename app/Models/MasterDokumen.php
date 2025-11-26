<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDokumen extends Model
{
    /** @use HasFactory<\Database\Factories\MasterDokumenFactory> */
    use HasFactory;

    protected $table = 'master_dokumen';

    protected $fillable = ['nama_dokumen', 'tipe_file'];

    // Relasi balik ke Posisi (Opsional, tapi bagus untuk cek dokumen ini dipakai di posisi mana aja)
    public function posisi()
    {
        return $this->belongsToMany(Posisi::class, 'posisi_syarat_dokumen', 'dokumen_id', 'posisi_id')
                    ->withPivot('is_mandatory')
                    ->withTimestamps();
    }
}
