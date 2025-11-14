# Quick Command Reference - Calculus Project

## 🚀 Setup Database Pertama Kali

```bash
# Install dependencies (jika belum)
composer install

# Copy environment file (jika belum)
copy .env.example .env

# Generate application key (jika belum)
php artisan key:generate

# Konfigurasi database di .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=calculus
# DB_USERNAME=root
# DB_PASSWORD=

# Buat database (pastikan MySQL/MariaDB running)
# CREATE DATABASE calculus;

# Jalankan migration dan seeder
php artisan migrate:fresh --seed
```

## 📝 Command Migration

```bash
# Jalankan migration
php artisan migrate

# Rollback migration terakhir
php artisan migrate:rollback

# Rollback semua migration
php artisan migrate:reset

# Drop semua tabel dan jalankan ulang migration
php artisan migrate:fresh

# Drop semua tabel, jalankan migration + seeder
php artisan migrate:fresh --seed

# Cek status migration
php artisan migrate:status
```

## 🌱 Command Seeder

```bash
# Jalankan semua seeder
php artisan db:seed

# Jalankan seeder tertentu
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=ListFoodSeeder

# Refresh migration + seeder
php artisan migrate:fresh --seed
```

## 🔨 Command Membuat File Baru

```bash
# Membuat migration baru
php artisan make:migration create_nama_table_table

# Membuat seeder baru
php artisan make:seeder NamaSeeder

# Membuat model
php artisan make:model NamaModel

# Membuat model + migration
php artisan make:model NamaModel -m

# Membuat controller
php artisan make:controller NamaController
```

## 🔄 Command Cache & Optimize

```bash
# Clear application cache
php artisan cache:clear

# Clear route cache
php artisan route:clear

# Clear config cache
php artisan config:clear

# Clear view cache
php artisan view:clear

# Optimize autoload
composer dump-autoload

# Optimize untuk production
php artisan optimize
```

## 🖥️ Command Development Server

```bash
# Jalankan development server
php artisan serve

# Jalankan di host & port tertentu
php artisan serve --host=0.0.0.0 --port=8080
```

## 🗄️ Command Database

```bash
# Masuk ke database console
php artisan db

# Backup database (manual dengan mysqldump)
mysqldump -u root -p calculus > backup.sql

# Restore database
mysql -u root -p calculus < backup.sql
```

## 🧹 Command Maintenance

```bash
# Masuk ke maintenance mode
php artisan down

# Keluar dari maintenance mode
php artisan up

# Generate storage link
php artisan storage:link
```

## 📊 Command Debug & Info

```bash
# Tampilkan route list
php artisan route:list

# Tampilkan environment
php artisan env

# Tampilkan konfigurasi
php artisan config:show database

# Tinker (Laravel console)
php artisan tinker
```

## 🔐 Contoh Penggunaan di Tinker

```php
# Buka tinker
php artisan tinker

# Cek user
>>> App\Models\User::all();

# Cek makanan
>>> DB::table('list_food')->get();

# Login user
>>> $user = App\Models\User::where('email', 'john@example.com')->first();

# Hash password
>>> use Illuminate\Support\Facades\Hash;
>>> Hash::make('password123');

# Cek password
>>> Hash::check('password123', $user->password);
```

## ⚠️ Troubleshooting Commands

```bash
# Jika ada error autoload
composer dump-autoload

# Jika ada error permission (Linux/Mac)
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache

# Jika ada error migration
php artisan migrate:reset
php artisan migrate

# Jika ada error seeder
composer dump-autoload
php artisan db:seed

# Clear semua cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 💡 Tips

1. **Selalu backup database** sebelum menjalankan `migrate:fresh`
2. **Gunakan `.env`** untuk konfigurasi database, jangan hardcode
3. **Jalankan `composer dump-autoload`** jika ada error class not found
4. **Cek `php artisan migrate:status`** untuk melihat migration mana yang sudah jalan
5. **Gunakan tinker** untuk testing query database dengan cepat

---

_File ini berisi command yang sering digunakan untuk development Laravel._
