# RESTful API - User Management

Tes Evaluasi Teknis Fullstack Developer - PT Rimba Ananta Vikasa Indonesia

## 🛠 Teknologi
- Framework: Laravel 12
- Database: MySQL
- Arsitektur: MVC
- Log: Monolog (ke file `storage/logs/laravel.log`)
- Testing: PHPUnit

## 📦 Fitur
- CRUD untuk entitas `User`:
  - `id` (auto-increment)
  - `name` (string)
  - `email` (unique string)
  - `age` (number)
- Validasi input (required, valid email, unique email)
- Log semua request (log laravel bawaan)
- Testing dengan PHPUnit

## 📌 Endpoint

| Method | URL           | Keterangan             |
|--------|---------------|------------------------|
| GET    | /api/users    | Ambil semua user       |
| GET    | /api/users/{id} | Ambil user berdasarkan ID |
| POST   | /api/users    | Tambah user baru       |
| PUT    | /api/users/{id} | Perbarui user          |
| DELETE | /api/users/{id} | Hapus user             |

## ⚙️ Instalasi

```bash
git clone https://github.com/namakamu/backend-user-api.git
cd backend-user-api
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
