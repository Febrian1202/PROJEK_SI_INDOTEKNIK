<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    
    <div style="max-width: 600px; margin: 20px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        
        <div style="background-color: #041E37; padding: 20px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 20px;">PT. Indoteknik Prima Mekongga</h1>
        </div>

        <div style="padding: 30px; color: #333333;">
            <h2 style="color: #041E37; margin-top: 0;">Permintaan Reset Password</h2>
            <p>Halo, <strong>{{ $user->name }}</strong>!</p>
            <p>Kami menerima permintaan untuk mereset password akun Anda. Jika ini bukan Anda, abaikan email ini.</p>
            
            <p>Klik tombol di bawah ini untuk membuat password baru:</p>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ $url }}" style="background-color: #F18A12; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                    Reset Password Saya
                </a>
            </div>

            <p style="font-size: 12px; color: #777;">
                Jika tombol di atas tidak berfungsi, salin dan tempel link berikut ke browser Anda:<br>
                <a href="{{ $url }}" style="color: #0E63A5;">{{ $url }}</a>
            </p>
        </div>

        <div style="background-color: #eeeeee; padding: 15px; text-align: center; font-size: 12px; color: #666;">
            &copy; {{ date('Y') }} PT. Indoteknik Prima Mekongga. All rights reserved.
        </div>

    </div>

</body>
</html>