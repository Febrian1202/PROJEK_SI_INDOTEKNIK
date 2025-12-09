<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - Indoteknik</title>
</head>
<body style="font-family: 'Helvetica', 'Arial', sans-serif; background-color: #f3f4f6; margin: 0; padding: 0; -webkit-font-smoothing: antialiased;">

    <div style="max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        
        <div style="background-color: #041E37; padding: 30px 20px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px; letter-spacing: 2px; text-transform: uppercase;">
                INDOTEKNIK <span style="color: #F18A12;">PRIMA</span>
            </h1>
        </div>

        <div style="padding: 40px 30px; color: #374151;">
            
            <h2 style="margin-top: 0; color: #041E37; font-size: 20px;">Halo, Calon Kandidat!</h2>
            
            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                Terima kasih telah mendaftar di sistem rekrutmen <strong>PT. Indoteknik Prima Mekongga</strong>. Untuk melanjutkan proses pendaftaran, silakan masukkan kode verifikasi (OTP) berikut ini:
            </p>

            <div style="text-align: center; margin: 30px 0;">
                <div style="display: inline-block; background-color: #FFF8F1; border: 2px dashed #F18A12; padding: 15px 40px; border-radius: 8px;">
                    <span style="font-size: 32px; font-weight: bold; letter-spacing: 8px; color: #F18A12; display: block;">
                        {{ $otp }}
                    </span>
                </div>
            </div>

            <p style="font-size: 14px; color: #6b7280; text-align: center; margin-bottom: 30px;">
                Kode ini hanya berlaku selama <strong>10 menit</strong>.<br>
                Demi keamanan akun Anda, jangan berikan kode ini kepada siapapun.
            </p>
            
            <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 30px 0;">

            <p style="font-size: 14px; line-height: 1.5;">
                Jika Anda tidak merasa melakukan pendaftaran, abaikan email ini atau hubungi tim HR kami.
            </p>
        </div>

        <div style="background-color: #f9fafb; padding: 20px; text-align: center; border-top: 1px solid #e5e7eb;">
            <p style="font-size: 12px; color: #9ca3af; margin: 0;">
                &copy; {{ date('Y') }} PT. Indoteknik Prima Mekongga. All rights reserved.<br>
                Jl. Contoh Alamat No. 123, Kolaka, Sulawesi Tenggara.
            </p>
        </div>

    </div>

    <div style="height: 40px;"></div>

</body>
</html>