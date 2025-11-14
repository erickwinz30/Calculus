# Summary: Migration & Seeder untuk Calculus Project

## ✅ Yang Telah Dibuat

### Migrations (7 files)

1. **2014_10_12_000000_create_users_table.php** (Updated)

    - Update untuk menambahkan field height, weight, bmr
    - Semua field numeric dibuat nullable
    - Username dibuat unique

2. **2024_11_14_000001_create_list_food_table.php** (New)

    - Master data untuk daftar makanan
    - Berisi informasi nutrisi lengkap per 100 gram

3. **2024_11_14_000002_create_food_table.php** (New)

    - Untuk menyimpan makanan yang sudah dikonsumsi user
    - Struktur sama dengan list_food tapi dengan kalori/berat custom

4. **2024_11_14_000003_create_breakfast_table.php** (New)

    - Relasi user dengan makanan sarapan
    - Foreign key ke users dan food

5. **2024_11_14_000004_create_lunch_table.php** (New)

    - Relasi user dengan makanan makan siang
    - Foreign key ke users dan food

6. **2024_11_14_000005_create_dinner_table.php** (New)

    - Relasi user dengan makanan makan malam
    - Foreign key ke users dan food

7. **2024_11_14_000006_create_snack_table.php** (New)
    - Relasi user dengan makanan cemilan
    - Foreign key ke users dan food

### Seeders (2 files)

1. **UserSeeder.php** (New)

    - 3 user sample dengan data lengkap
    - Password sudah di-hash dengan bcrypt
    - BMR sudah dihitung

2. **ListFoodSeeder.php** (New)

    - 20 makanan populer Indonesia
    - Data nutrisi lengkap (kalori, protein, lemak, karbohidrat, dll)
    - Semua per 100 gram

3. **DatabaseSeeder.php** (Updated)
    - Memanggil UserSeeder dan ListFoodSeeder

### Dokumentasi

1. **DATABASE_SETUP.md**
    - Panduan lengkap cara menggunakan migration & seeder
    - Penjelasan struktur database
    - Troubleshooting

## 🚀 Cara Menggunakan

### Quick Start

```bash
# 1. Drop semua tabel lama dan buat yang baru + seed data
php artisan migrate:fresh --seed

# Atau step by step:

# 2. Jalankan migration saja
php artisan migrate

# 3. Jalankan seeder saja
php artisan db:seed
```

### Credentials User Sample

```
User 1:
- Username: johndoe
- Email: john@example.com
- Password: password123

User 2:
- Username: janedoe
- Email: jane@example.com
- Password: password123

User 3:
- Username: admin
- Email: admin@example.com
- Password: admin123
```

## 📊 Struktur Database

```
┌─────────────┐
│    users    │
└──────┬──────┘
       │
       ├──────┐
       │      │
   ┌───▼──┐   │
   │breakfast│  │
   └───┬──┘   │
       │      │
   ┌───▼──┐   │
   │ lunch│   │
   └───┬──┘   │        ┌──────────┐
       │      ├────────► food     │
   ┌───▼──┐   │        └──────────┘
   │dinner│   │
   └───┬──┘   │
       │      │
   ┌───▼──┐   │
   │ snack│───┘
   └──────┘

┌─────────────┐
│  list_food  │ (Master Data)
└─────────────┘
```

## 📝 Catatan Penting

1. **Urutan Migration**: Sudah diatur dengan nama file agar urutan eksekusi benar
2. **Foreign Keys**: Semua relasi menggunakan cascade delete
3. **Data Nutrisi**: Berdasarkan standar per 100 gram makanan
4. **BMR Formula**:
    - Laki-laki: Harris-Benedict Equation
    - Perempuan: Harris-Benedict Equation (modified)

## 🔧 Customisasi

### Menambah User Sample

Edit file: `database/seeders/UserSeeder.php`

### Menambah Makanan Sample

Edit file: `database/seeders/ListFoodSeeder.php`

### Mengubah Struktur Tabel

Edit file migration yang sesuai, kemudian jalankan:

```bash
php artisan migrate:fresh --seed
```

## ✨ Fitur Database

-   ✅ User authentication ready
-   ✅ Master data makanan
-   ✅ Tracking makanan per waktu makan (breakfast, lunch, dinner, snack)
-   ✅ Perhitungan nutrisi otomatis
-   ✅ BMR calculation support
-   ✅ Profile picture support
-   ✅ Cascade delete untuk data integrity

## 📖 File Referensi

-   Dokumentasi lengkap: `DATABASE_SETUP.md`
-   User Model: `app/Models/User.php`
-   Account Model: `app/Models/ModelAccount.php`
-   Food Model: `app/Models/ModelFood.php`
-   Main Page Model: `app/Models/ModelMainPage.php`

---

**Selamat menggunakan! Database Anda siap digunakan.** 🎉
