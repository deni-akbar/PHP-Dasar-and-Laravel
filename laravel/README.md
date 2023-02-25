# Installasi Laravel Dasar
1. Pindah folder 'laravel' ke htdocs
2. Buat Database db-transisi
3. Pastikan nama database sudah sesuaikan pada .env (jika masih .env.example rename menjadi .env)
4. Lalu jalankan 'composer install'
5. Lalu jalankan 'npm install'
6. Lalu jalankan 'php artisan key:generate'
7. Lalu jalankan 'php artisan migrate --seed'
8. Lalu jalankan 'php artisan serve'
9. Buka default url http://127.0.0.1:8000/