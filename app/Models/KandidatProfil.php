<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KandidatProfil extends Model
{
    /** @use HasFactory<\Database\Factories\KandidatProfilFactory> */
    use HasFactory;

    protected $table = 'kandidat_profil';

    protected $fillable = [
        'user_id', 'nama_lengkap', 'no_ktp', 'no_telp', 'alamat_domisili', 'tgl_lahir'
    ];

    // Relasi ke User Login
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Seorang kandidat bisa punya banyak lamaran
    public function lamaran()
    {
        return $this->hasMany(Lamaran::class, 'kandidat_id');
    }
}
