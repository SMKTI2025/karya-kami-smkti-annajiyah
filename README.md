# **Karya Kami - SMKTI Annajiyah**  

**Karya Kami** adalah platform untuk menyimpan dan menampilkan proyek-proyek siswa SMKTI Annajiyah. Platform ini memungkinkan siswa untuk mempublikasikan proyek mereka yang di-host di internet, baik secara **publik** maupun melalui **GitHub**.  

### ✨ **Teknologi yang Digunakan**  

- **Laravel 10** (Backend)  
- **Filament 3.2** (Admin Dashboard)
- ⚡ Quick CRUD generation with customized [FilamentPHP](https://filamentphp.com/) stubs
    - Optimized UX out of the box
    - No need to modify generated resources
- 🔄 Auto reload on save for rapid development
- 📚 Easy API documentation
- 📤 Built-in Export and Import examples in Filament resources

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