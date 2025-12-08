<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rekrutmen</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 18px; color: #041E37; }
        .header p { margin: 2px 0; color: #555; }
        .line { border-bottom: 2px solid #041E37; margin-top: 10px; margin-bottom: 20px; }
        
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #041E37; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        
        .footer { position: fixed; bottom: 0; width: 100%; font-size: 10px; text-align: right; color: #888; }
        .ttd { float: right; width: 200px; text-align: center; margin-top: 50px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>PT. INDOTEKNIK PRIMA MEKONGGA</h1>
        <p>Jl. Nusantara No. 86 Kel. Dawi-Dawi, Kec. Pomalaa, Kab. Kolaka Sulawesi Tenggara 93562</p>
        <p>Telp: (0405) 2310860 | 0821 4314 7168 | Email: ptindoteknikprimamekongga3@gmail.com</p>
    </div>
    <div class="line"></div>

    <div style="text-align: center; margin-bottom: 20px;">
        <h3 style="margin:0;">LAPORAN PENERIMAAN KARYAWAN BARU</h3>
        <p>Periode: {{ \Carbon\Carbon::createFromDate($tahun, $bulan)->translatedFormat('F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">NIK</th>
                <th style="width: 25%">Nama Karyawan</th>
                <th style="width: 20%">Posisi / Jabatan</th>
                <th style="width: 20%">Penempatan (Site)</th>
                <th style="width: 15%">Tgl Bergabung</th>
            </tr>
        </thead>
        <tbody>
            @forelse($karyawan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nik_karyawan }}</td>
                    <td>{{ $item->kandidat->nama_lengkap }}</td>
                    <td>{{ $item->lamaran->posisi->nama_posisi }}</td>
                    <td>{{ $item->site->nama_site }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_bergabung)->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 20px;">
                        Tidak ada data karyawan baru pada periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="ttd">
        <p>Kolaka, {{ $tanggal_cetak }}</p>
        <p>Mengetahui,</p>
        <br><br><br>
        <p><strong>{{ $admin_name }}</strong></p>
        <p>Direktur Utama</p>
    </div>

    <div class="footer">
        Dicetak otomatis oleh Sistem Informasi Rekrutmen Indoteknik
    </div>

</body>
</html>