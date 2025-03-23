# **Karya Kami - SMKTI Annajiyah**  

**Karya Kami** adalah platform untuk menyimpan dan menampilkan proyek-proyek siswa SMKTI Annajiyah. Platform ini memungkinkan siswa untuk mempublikasikan proyek mereka yang di-host di internet, baik secara **publik** maupun melalui **GitHub**.  

## ✨ **Teknologi yang Digunakan**  

- **Laravel 10** (Backend)  
- **Filament 3.2** (Admin Dashboard)
- ⚡ Quick CRUD generation dengan kustomisasi [FilamentPHP](https://filamentphp.com/) stubs
    - UX yang sudah dioptimalkan
    - Tidak perlu banyak modifikasi setelah pembuatan resource
- 🔄 Auto reload saat penyimpanan untuk pengembangan cepat
- 📚 Dokumentasi API yang mudah dibuat
- 📤 Contoh ekspor dan impor data langsung di Filament resources

## 🔐 **Authentication & Authorization**
- 🛡️ Role-Based Access Control (RBAC) menggunakan [Filament Shield](https://filamentphp.com/plugins/bezhansalleh-shield)
- 🔑 Halaman login yang telah dikustomisasi
- 👤 Manajemen profil pengguna dengan [Filament Breezy](https://filamentphp.com/plugins/jeffgreco-breezy)
- 🔒 Dukungan Two-Factor Authentication (2FA)
- 👥 Pengelolaan user dan role yang lebih sederhana

## ⚙️ **Konfigurasi & Pengaturan**

- 🎛️ Manajemen plugin dinamis dengan [Filament Settings](https://filamentphp.com/plugins/filament-spatie-settings)
    - Mengaktifkan/menonaktifkan fitur secara langsung
    - Integrasi dengan [Spatie Laravel Settings](https://github.com/spatie/laravel-settings)

---

## 🚀 **Instalasi & Konfigurasi**  

### **1. Clone Repository**  
```sh
git clone https://github.com/username/repo.git
cd repo
```

### **2. Buat File `.env`**  
```sh
cp .env.example .env
```

### **3. Konfigurasi Database**  
Buka file `.env` dan sesuaikan konfigurasi database:  
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=karya-kami-db
DB_USERNAME=root
DB_PASSWORD=
```

### **4. Install Dependency**  
```sh
composer install
npm install
```

### **5. Generate Key**  
```sh
php artisan key:generate
```

### **6. Migrasi Database**  
```sh
php artisan migrate
```

### **7. Jalankan Server**  
```sh
php artisan serve
```
Akses website di: [http://127.0.0.1:8000](http://127.0.0.1:8000)  

---

## 📌 **Catatan Pengembangan**  
Proyek ini akan terus dikembangkan, tetapi **tidak ada jadwal update yang pasti**. Kami berusaha untuk memberikan fitur terbaik bagi siswa SMKTI Annajiyah.  

Jika ingin berkontribusi atau memberikan saran, silakan buat **issue** atau **pull request** di repository ini. 🚀  

## 📧 **Email Development & Testing**  
Proyek ini menggunakan **MailDev** untuk menangani pengujian email selama pengembangan. Untuk menjalankan MailDev secara lokal:  
```sh
maildev --web 8081 --smtp 1025
```
Akses antarmuka MailDev di: [http://127.0.0.1:8081](http://127.0.0.1:8081)  

