<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    /** @use HasFactory<\Database\Factories\LamaranFactory> */
    use HasFactory;

    protected $table = 'lamaran';

    protected $fillable = ['kandidat_id', 'posisi_id', 'tgl_lamar', 'status', 'catatan_hr'];

    // Milik siapa lamaran ini?
    public function kandidat()
    {
        return $this->belongsTo(KandidatProfil::class, 'kandidat_id');
    }

    // Melamar posisi apa?
    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'posisi_id');
    }

    // Lamaran ini punya berkas apa saja yang diupload?
    public function berkas()
    {
        return $this->hasMany(BerkasKandidat::class, 'lamaran_id');
    }
}
