<!DOCTYPE html>
<html>

<head>
    <title>Kartu Peserta Rekrutmen</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        .card {
            border: 2px solid #041E37;
            border-radius: 10px;
            padding: 20px;
            position: relative;
        }

        .header {
            text-align: center;
            border-bottom: 2px double #F18A12;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        .logo {
            width: 80px;
            height: auto;
            margin-bottom: 5px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            color: #041E37;
            text-transform: uppercase;
            margin: 5px 0;
        }

        .subtitle {
            font-size: 12px;
            color: #555;
            font-weight: bold;
        }

        /* Layout Utama menggunakan Tabel */
        .content-layout {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .col-photo {
            width: 130px;
            vertical-align: top;
        }

        .col-data {
            vertical-align: top;
            padding-left: 25px;
        }

        /* Frame Foto */
        .photo-frame {
            width: 3cm;
            height: 4cm;
            border: 1px solid #ddd;
            padding: 5px;
            background: #f9f9f9;
            overflow: hidden;
        }

        .photo-img {
            width: 100%;
            height: auto;
        }

        /* Tabel Data Diri (Perbaikan agar tidak offside) */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            vertical-align: top;
            padding-bottom: 10px;
            /* Jarak antar baris */
            font-size: 14px;
        }

        .label-cell {
            width: 110px;
            /* Lebar tetap untuk label */
            font-weight: bold;
            color: #041E37;
            white-space: nowrap;
            /* Mencegah label turun baris */
        }

        .value-cell {
            /* Kolom nilai akan mengambil sisa ruang yang ada */
        }

        .reg-number {
            font-weight: bold;
            font-size: 16px;
            color: #041E37;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 12px;
        }

        .ttd-box {
            display: inline-block;
            text-align: center;
            width: 150px;
        }

        .note {
            margin-top: 50px;
            font-size: 10px;
            color: #777;
            border-top: 1px dashed #ccc;
            padding-top: 8px;
            font-style: italic;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="header">
            <img src="{{ public_path('assets/img/Logo-09.png') }}" class="logo">
            <div class="title">KARTU TANDA PESERTA REKRUTMEN</div>
            <div class="subtitle">PT. INDOTEKNIK PRIMA MEKONGGA</div>
        </div>

        <table class="content-layout">
            <tr>
                <td class="col-photo">
                    <div class="photo-frame">
                        @if ($profil->foto)
                            <img src="{{ public_path('storage/' . $profil->foto) }}" class="photo-img">
                        @else
                            <div style="text-align:center; padding-top: 50%; color:#ccc; font-size: 12px;">No Photo
                            </div>
                        @endif
                    </div>
                </td>

                <td class="col-data">
                    <table class="data-table">
                        <tr>
                            <td class="label-cell">NO. PESERTA</td>
                            <td class="value-cell">: <span
                                    class="reg-number">REG-{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</span></td>
                        </tr>
                        <tr>
                            <td class="label-cell">NAMA</td>
                            <td class="value-cell">: {{ strtoupper($user->name) }}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">NIK</td>
                            <td class="value-cell">: {{ $profil->no_ktp }}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">EMAIL</td>
                            <td class="value-cell">: {{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">NO. HP</td>
                            <td class="value-cell">: {{ $profil->no_telp }}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">TGL DAFTAR</td>
                            <td class="value-cell">: {{ $user->created_at->format('d F Y') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="footer">
            <div class="ttd-box">
                Kolaka, {{ date('d F Y') }}<br>
                Peserta,<br><br><br><br><br>
                <strong>{{ strtoupper($user->name) }}</strong>
            </div>
        </div>

        <div class="note">
            * Kartu ini adalah bukti sah pendaftaran rekrutmen.<br>
            * Harap membawa kartu ini beserta dokumen asli saat jadwal wawancara/psikotes.
        </div>
    </div>

</body>

</html>
