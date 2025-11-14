# 🗄️ Database Setup Guide - Calculus Project

## Pendahuluan

Project **Calculus** adalah aplikasi calorie tracker berbasis Laravel yang membantu user untuk melacak asupan kalori harian mereka. Database project ini terdiri dari beberapa tabel utama untuk mengelola user, makanan, dan tracking konsumsi makanan per waktu makan.

---

## 📋 Prerequisites

Sebelum memulai, pastikan Anda sudah memiliki:

-   ✅ PHP >= 7.4
-   ✅ Composer
-   ✅ MySQL/MariaDB
-   ✅ Laragon/XAMPP/MAMP (atau web server lainnya)
-   ✅ Git (opsional)

---

## 🚀 Setup Database (Step by Step)

### Step 1: Clone/Download Project

```bash
# Jika menggunakan Git
git clone <repository-url>
cd Calculus

# Atau extract file zip project ke folder laragon/www/
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Setup Environment File

```bash
# Copy file .env.example menjadi .env
copy .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Konfigurasi Database

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=calculus          # <-- Nama database
DB_USERNAME=root              # <-- Username MySQL
DB_PASSWORD=                  # <-- Password MySQL (kosongkan jika tidak ada)
```

### Step 5: Buat Database

Buka MySQL console atau phpMyAdmin, kemudian buat database baru:

```sql
CREATE DATABASE calculus CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Atau menggunakan command line:

```bash
mysql -u root -p -e "CREATE DATABASE calculus CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### Step 6: Jalankan Migration & Seeder

```bash
# Jalankan migration untuk membuat semua tabel
php artisan migrate

# Jalankan seeder untuk mengisi data sample
php artisan db:seed

# Atau jalankan sekaligus (drop all tables, migrate, seed)
php artisan migrate:fresh --seed
```

### Step 7: Verifikasi

Cek apakah tabel sudah terbuat dengan benar:

```bash
# Jalankan tinker
php artisan tinker

# Di dalam tinker, jalankan:
>>> DB::table('users')->count();
# Seharusnya return: 3

>>> DB::table('list_food')->count();
# Seharusnya return: 20
```

### Step 8: Generate Storage Link (Untuk Profile Picture)

```bash
php artisan storage:link
```

### Step 9: Jalankan Development Server

```bash
php artisan serve
```

Buka browser dan akses: `http://localhost:8000`

---

## 🔐 Credentials Login

Setelah seeder dijalankan, Anda dapat login dengan credentials berikut:

| Username | Email             | Password    |
| -------- | ----------------- | ----------- |
| johndoe  | john@example.com  | password123 |
| janedoe  | jane@example.com  | password123 |
| admin    | admin@example.com | admin123    |

---

## 📊 Struktur Database

### Tabel-tabel yang dibuat:

1. **users** - Data pengguna aplikasi
2. **list_food** - Master data makanan (database makanan)
3. **food** - Makanan yang sudah dikonsumsi (custom weight)
4. **breakfast** - Relasi user dengan makanan sarapan
5. **lunch** - Relasi user dengan makanan makan siang
6. **dinner** - Relasi user dengan makanan makan malam
7. **snack** - Relasi user dengan makanan cemilan

### Entity Relationship Diagram (ERD):

```
┌─────────────────────────────┐
│          USERS              │
│                             │
│ - id (PK)                   │
│ - username (unique)         │
│ - email (unique)            │
│ - password                  │
│ - name                      │
│ - sex                       │
│ - date_of_birth             │
│ - profile_pic               │
│ - height                    │
│ - weight                    │
│ - bmr                       │
│ - role                      │
└──────────┬──────────────────┘
           │
           │ 1:N (One to Many)
           │
      ┌────┴────┬────────┬────────┐
      │         │        │        │
┌─────▼──┐  ┌──▼────┐  ┌▼─────┐ ┌▼─────┐
│BREAKFAST│ │ LUNCH │  │DINNER│ │SNACK │
│         │ │       │  │      │ │      │
│- id (FK)│ │-id(FK)│  │-id(FK│ │-id(FK│
│- id_food│ │-id_food│ │-id_fd│ │-id_fd│
│- date   │ │- date │  │- date│ │- date│
└────┬────┘ └───┬───┘  └──┬───┘ └──┬───┘
     │          │          │        │
     │          │          │        │
     └──────────┴──────────┴────────┘
                │
                │ N:1 (Many to One)
                │
          ┌─────▼──────────┐
          │     FOOD       │
          │                │
          │ - id_food (PK) │
          │ - food_name    │
          │ - food_calories│
          │ - cholesterol  │
          │ - fat          │
          │ - protein      │
          │ - carbohydrate │
          │ - sodium       │
          │ - sugar        │
          │ - weight       │
          └────────────────┘

┌─────────────────────────────┐
│       LIST_FOOD             │
│    (Master Data)            │
│                             │
│ - id_list_food (PK)         │
│ - food_name                 │
│ - food_calories             │
│ - cholesterol               │
│ - fat                       │
│ - protein                   │
│ - carbohydrate              │
│ - sodium                    │
│ - sugar                     │
│ - weight (per 100g)         │
└─────────────────────────────┘
```

---

## 🛠️ Troubleshooting

### Error: "SQLSTATE[HY000] [1049] Unknown database 'calculus'"

**Solusi:** Database belum dibuat. Buat database terlebih dahulu:

```bash
mysql -u root -p -e "CREATE DATABASE calculus;"
```

### Error: "SQLSTATE[HY000] [2002] Connection refused"

**Solusi:** MySQL/MariaDB belum running. Start MySQL service:

-   **Laragon:** Start All
-   **XAMPP:** Start Apache & MySQL
-   **Command Line:** `net start mysql` (Windows)

### Error: "Class 'Database\Seeders\UserSeeder' not found"

**Solusi:** Autoload belum update. Jalankan:

```bash
composer dump-autoload
php artisan db:seed
```

### Error: "Syntax error or access violation: 1071 Specified key was too long"

**Solusi:** Update charset di `config/database.php`:

```php
'charset' => 'utf8mb4',
'collation' => 'utf8mb4_unicode_ci',
'prefix' => '',
'prefix_indexes' => true,
'strict' => true,
'engine' => null,
'options' => extension_loaded('pdo_mysql') ? array_filter([
    PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
]) : [],
```

Atau downgrade migration dengan mengubah di `AppServiceProvider.php`:

```php
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
```

### Database Sudah Ada Data Lama

**Solusi:** Reset database:

```bash
# Backup dulu jika perlu
mysqldump -u root -p calculus > backup_$(date +%Y%m%d).sql

# Reset migration
php artisan migrate:fresh --seed
```

---

## 📖 File Referensi

-   **DATABASE_SETUP.md** - Dokumentasi lengkap struktur database
-   **MIGRATION_SUMMARY.md** - Summary migration & seeder
-   **COMMANDS.md** - Quick command reference
-   **manual_setup.sql** - SQL manual untuk setup database

---

## 🔄 Update Database Schema

Jika Anda perlu mengubah struktur database:

### 1. Membuat Migration Baru

```bash
php artisan make:migration add_column_to_users_table --table=users
```

### 2. Edit Migration File

```php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->nullable()->after('email');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('phone');
    });
}
```

### 3. Jalankan Migration

```bash
php artisan migrate
```

---

## 📝 Menambah Data Sample

### Menambah User Baru

Edit `database/seeders/UserSeeder.php`:

```php
DB::table('users')->insert([
    'username' => 'newuser',
    'email' => 'newuser@example.com',
    'password' => Hash::make('password123'),
    'name' => 'New User',
    'sex' => 'Laki-laki',
    'date_of_birth' => '2000-01-01',
    'profile_pic' => 'avatar.png',
    'height' => 170.00,
    'weight' => 65.00,
    'bmr' => 1600.00,
    'role' => 'client',
    'created_at' => now(),
    'updated_at' => now(),
]);
```

Kemudian jalankan:

```bash
php artisan db:seed --class=UserSeeder
```

### Menambah Makanan Baru

Edit `database/seeders/ListFoodSeeder.php` dan tambahkan ke array `$foods`:

```php
[
    'id_list_food' => Str::random(10),
    'food_name' => 'Nama Makanan',
    'food_calories' => 100.00,
    'cholesterol' => 0.00,
    'fat' => 5.00,
    'protein' => 10.00,
    'carbohydrate' => 15.00,
    'sodium' => 50.00,
    'sugar' => 2.00,
    'weight' => 100.00,
],
```

Kemudian jalankan:

```bash
php artisan db:seed --class=ListFoodSeeder
```

---

## ✅ Checklist Setup

-   [ ] PHP >= 7.4 installed
-   [ ] Composer installed
-   [ ] MySQL/MariaDB running
-   [ ] Database `calculus` created
-   [ ] `.env` file configured
-   [ ] `composer install` executed
-   [ ] `php artisan key:generate` executed
-   [ ] `php artisan migrate` executed
-   [ ] `php artisan db:seed` executed
-   [ ] `php artisan storage:link` executed
-   [ ] Can login with sample user
-   [ ] Development server running

---

## 🎉 Selesai!

Database Anda sekarang sudah siap digunakan. Untuk informasi lebih lanjut, lihat file-file dokumentasi lainnya:

-   `DATABASE_SETUP.md` - Dokumentasi detail
-   `MIGRATION_SUMMARY.md` - Summary migration
-   `COMMANDS.md` - Command reference

**Happy Coding! 🚀**
