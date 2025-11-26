/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                // Menambahkan warna kustom dari logo
                brand: {
                    navy: '#041E37',   // Biru Gelap (Teks PT)
                    blue: '#0E63A5',   // Biru Icon Rumah
                    orange: '#F18A12', // Oranye Gear
                    gray: '#F3F4F6',   // Abu-abu muda untuk background section
                }
            }
        },
    },
    plugins: [],
}