# 📦 Kriingg - Sistem Manajemen Pemesanan Barang

Selamat datang di **Kriingg**, aplikasi manajemen pemesanan produk berbasis Laravel 12 yang dirancang untuk menyederhanakan proses pemesanan pelanggan dan mempermudah pengelolaan bagi admin. Dengan antarmuka modern dan dukungan multi-role, Kriingg menghadirkan pengalaman pengguna yang rapi dan responsif untuk semua peran. 🎉

---

## 🌟 Fitur Utama

### Untuk Pelanggan

* **Antarmuka Modern**: Desain menarik dengan Tailwind CSS, navbar tetap, animasi halus, dan kartu pemesanan interaktif.
* **Manajemen Pesanan**: Buat dan lihat pesanan, lengkap dengan perhitungan harga total otomatis dan filter status (Menunggu, Diproses, Selesai).
* **Pengelolaan Profil**: Ubah nama, email, dan password dengan form yang responsif dan mudah digunakan.
* **Desain Responsif**: Nyaman digunakan di desktop maupun perangkat mobile.

### Untuk Admin

* **Dashboard Profesional**: SB Admin 2 dengan metrik penjualan, grafik (Chart.js), dan DataTables.
* **Manajemen Produk**: CRUD lengkap produk, fitur pencarian, dan validasi.
* **Manajemen Pesanan**: Lihat, filter, cari, ubah status, dan tambahkan catatan admin pada pesanan.
* **Laporan Penjualan**: Buat dan ekspor laporan penjualan ke Excel berdasarkan rentang tanggal.
* **Pengelolaan Profil**: Perbarui informasi akun melalui antarmuka SB Admin 2.

### Umum

* **Dukungan Multi-Role**: Alur berbeda untuk pelanggan dan admin.
* **Autentikasi Aman**: Login, logout, registrasi, dan update profil dengan redirect berdasarkan peran.
* **UX Interaktif**: Navbar dan footer tetap, layout berbasis kartu, dan fitur JavaScript seperti update harga real-time.

---

## 🛠️ Stack Teknologi

* **Framework**: Laravel 12
* **Bahasa**: PHP 8.2
* **Database**: MySQL
* **Frontend**:

  * Pelanggan: Tailwind CSS (CDN), FontAwesome, Nunito Font
  * Admin: SB Admin 2, Chart.js, DataTables
* **Dependensi Tambahan**:

  * `maatwebsite/excel` untuk ekspor laporan
  * jQuery untuk peningkatan interaktivitas
* **Tools**: Composer, Node.js, npm (opsional)

---

## 📋 Syarat Sistem

* PHP >= 8.2
* Composer
* MySQL
* Node.js & npm *(opsional, jika ingin compile Tailwind secara lokal)*
* Laravel CLI *(opsional untuk kenyamanan)*

---

## ⚙️ Cara Instalasi

1. **Clone Repository**

```bash
git clone https://github.com/your-repo/kriingg.git
cd kriingg
```

2. **Install Dependensi PHP**

```bash
composer install
```

3. **Install Dependensi Frontend (opsional)**

```bash
npm install
```

4. **Setup Environment**

```bash
cp .env.example .env
```

Lalu ubah konfigurasi database di file `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kriingg
DB_USERNAME=root
DB_PASSWORD=
```

5. **Generate Key dan Migrasi**

```bash
php artisan key:generate
php artisan migrate
```

6. **Seed Database (opsional)**

```bash
php artisan db:seed
```

7. **Compile Asset (jika tidak pakai CDN)**

```bash
npm run dev
```

8. **Jalankan Server**

```bash
php artisan serve
```

Akses aplikasi di: [http://localhost:8000](http://localhost:8000)

---

## 🔐 Akun Default (Seeder)

### Admin

* Email: `admin@kriingg.com`
* Password: `password`

### Pelanggan

* Email: `customer1@kriingg.com`, Password: `password`
* Email: `zall25@krringg.com`, Password: `password`

---

## 🚀 Panduan Penggunaan

### Pelanggan

* **Registrasi/Login**: Akses `/register` atau `/login`
* **Kelola Pesanan**: Akses `/orders` untuk melihat dan filter pesanan. Klik "Create New Order" untuk membuat pesanan baru.
* **Ubah Profil**: Buka `/profile` untuk update data akun.

### Admin

* **Login**: Akses `/login` sebagai admin.
* **Dashboard**: Lihat metrik penjualan di `/admin/dashboard`
* **Produk**: CRUD di `/products`
* **Pesanan**: Kelola status dan catatan di `/orders`
* **Laporan**: Ekspor data penjualan di `/reports`
* **Profil**: Ubah data akun di `/profile`

---

## 🎨 Highlight UI

### Antarmuka Pelanggan

* Navbar tetap dengan animasi hover dan background gradasi
* Daftar pesanan berbasis kartu dengan badge status berwarna
* Form pemesanan interaktif dengan perhitungan harga real-time
* Responsif dengan font Nunito & Tailwind CSS

### Antarmuka Admin

* SB Admin 2 dengan layout bersih dan profesional
* Tabel produk & pesanan interaktif (DataTables)
* Grafik penjualan (Chart.js)

---

## 🧪 Pengujian Fitur

### Pelanggan

* Registrasi akun
* Buat pesanan baru dan lihat total harga otomatis
* Filter status pesanan
* Update profil

### Admin

* Login admin
* CRUD produk & kelola pesanan
* Ekspor laporan

### Umum

* Cek tampilan di perangkat mobile
* Pastikan tidak ada error di console browser
* Logout menggunakan metode POST untuk keamanan

---

## 🗃️ Diagram ERD & Aktivitas

Tersedia di folder `/docs` atau akses langsung:
[Link Google Drive](https://drive.google.com/drive/folders/1N04jtJRtdYiZfueV5FKm_oth2np9mR3x?usp=sharing)

* `erd-kriingg.png`
* `activity-diagram-kriingg.pdf`

---

## 📝 Catatan

* **Produksi**: Amankan file `.env`, gunakan web server seperti Nginx, dan compile Tailwind dengan Vite
* **Aset SB Admin 2**: Tersedia di `public/vendor/`
* **Pengembangan**: Bebas menambahkan fitur seperti notifikasi email, detail pesanan, dll.
* **Keamanan**: Logout dengan POST mencegah CSRF. Bisa ditambahkan verifikasi email & reset password.

---

## 🤝 Kontribusi

Ingin bantu kembangkan Kriingg? Fork repo ini, buat branch baru, dan ajukan pull request!

---

## 📬 Kontak

Ada pertanyaan atau saran? Hubungi kami lewat [GitHub Issues](https://github.com/your-repo/kriingg/issues) atau email ke **[support@kriingg.com](mailto:support@kriingg.com)**.

> **Kriingg** – Menyederhanakan pemesanan, menyenangkan pengguna. Dibuat dengan ❤️ oleh *Faizal Ferdianto* untuk tantangan coding xAI!
