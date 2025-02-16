project ini adalah karya kami smkti annajiyah
gunanya untuk apa ?

untuk menyimpan project anak2 yang memang memiliki project di internet entah itu public atau di taruh di github intinya project ini dipakai untuk memperlihatkan project mereka. project ini pakai `laravel-10`, `filament 3.2`

untuk memakai project ini hal yang perlu dilakukan adalah

untuk membuat file .env
`cp .env.example .env`

lalu setting .env
`
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=karya-kami-db
DB_USERNAME=root
DB_PASSWORD=
`

untuk migrasi data ke database
`php artisan migrate`


project ini akan terus dikembangkan tapi nggak janji kalau updatenya itu setiap hari.