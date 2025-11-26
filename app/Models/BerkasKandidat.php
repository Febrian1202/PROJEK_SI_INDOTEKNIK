<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasKandidat extends Model
{
    /** @use HasFactory<\Database\Factories\BerkasKandidatFactory> */
    use HasFactory;

    protected $table = 'berkas_kandidat';

    protected $fillable = ['lamaran_id', 'dokumen_id', 'nama_file_asli', 'path_file', 'tgl_upload'];

    // Ini file untuk lamaran nomor berapa?
    public function lamaran()
    {
        return $this->belongsTo(Lamaran::class, 'lamaran_id');
    }

    // Ini jenis dokumen apa? (KTP/Ijazah/dll)
    public function jenisDokumen()
    {
        return $this->belongsTo(MasterDokumen::class, 'dokumen_id');
    }
}
