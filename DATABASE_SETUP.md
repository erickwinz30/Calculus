# Database Migration & Seeder - Calculus Project

## Daftar Migration

Berikut adalah migration yang telah dibuat untuk project ini:

### 1. Users Table (Updated)

-   File: `2014_10_12_000000_create_users_table.php`
-   Fields:
    -   id (primary key)
    -   username (unique)
    -   email (unique)
    -   password
    -   name
    -   sex (jenis kelamin)
    -   date_of_birth
    -   profile_pic (nullable)
    -   height (nullable)
    -   weight (nullable)
    -   bmr (Basal Metabolic Rate - nullable)
    -   role (default: 'client')
    -   timestamps

### 2. List Food Table

-   File: `2024_11_14_000001_create_list_food_table.php`
-   Fields:
    -   id_list_food (primary key, string 10 char)
    -   food_name
    -   food_calories
    -   cholesterol
    -   fat
    -   protein
    -   carbohydrate
    -   sodium
    -   sugar
    -   weight
    -   timestamps

### 3. Food Table

-   File: `2024_11_14_000002_create_food_table.php`
-   Fields: (sama dengan list_food, untuk menyimpan makanan yang sudah dikonsumsi)
    -   id_food (primary key, string 10 char)
    -   food_name
    -   food_calories
    -   cholesterol
    -   fat
    -   protein
    -   carbohydrate
    -   sodium
    -   sugar
    -   weight
    -   timestamps

### 4. Breakfast Table

-   File: `2024_11_14_000003_create_breakfast_table.php`
-   Fields:
    -   breakfast_id (primary key, auto increment)
    -   id (foreign key -> users.id)
    -   id_food (foreign key -> food.id_food)
    -   date
    -   timestamps

### 5. Lunch Table

-   File: `2024_11_14_000004_create_lunch_table.php`
-   Fields:
    -   lunch_id (primary key, auto increment)
    -   id (foreign key -> users.id)
    -   id_food (foreign key -> food.id_food)
    -   date
    -   timestamps

### 6. Dinner Table

-   File: `2024_11_14_000005_create_dinner_table.php`
-   Fields:
    -   dinner_id (primary key, auto increment)
    -   id (foreign key -> users.id)
    -   id_food (foreign key -> food.id_food)
    -   date
    -   timestamps

### 7. Snack Table

-   File: `2024_11_14_000006_create_snack_table.php`
-   Fields:
    -   snack_id (primary key, auto increment)
    -   id (foreign key -> users.id)
    -   id_food (foreign key -> food.id_food)
    -   date
    -   timestamps

## Database Seeders

### 1. UserSeeder

-   File: `database/seeders/UserSeeder.php`
-   Membuat 3 user sample:
    -   johndoe (john@example.com / password123)
    -   janedoe (jane@example.com / password123)
    -   admin (admin@example.com / admin123)

### 2. ListFoodSeeder

-   File: `database/seeders/ListFoodSeeder.php`
-   Membuat 20 data makanan sample dengan informasi nutrisi lengkap
-   Termasuk makanan Indonesia populer seperti:
    -   Nasi Putih
    -   Ayam Goreng
    -   Tempe Goreng
    -   Tahu Goreng
    -   Sayur Bayam
    -   Dan lainnya...

## Cara Menjalankan Migration & Seeder

### Step 1: Reset Database (Opsional)

Jika Anda ingin mereset database yang sudah ada:

```bash
php artisan migrate:fresh
```

### Step 2: Jalankan Migration

Untuk membuat semua tabel:

```bash
php artisan migrate
```

### Step 3: Jalankan Seeder

Untuk mengisi data sample:

```bash
php artisan db:seed
```

### Atau jalankan semuanya sekaligus:

```bash
php artisan migrate:fresh --seed
```

## Struktur Database

```
users
├── breakfast (many) ─┐
├── lunch (many) ─────┤
├── dinner (many) ────┼─> food
└── snack (many) ─────┘

list_food (master data makanan)
```

## Catatan Penting

1. **Foreign Keys**: Semua tabel meal (breakfast, lunch, dinner, snack) memiliki foreign key constraint ke users dan food dengan cascade delete.

2. **Password Default**: Semua user sample menggunakan bcrypt hash. Password plaintext:

    - john@example.com: password123
    - jane@example.com: password123
    - admin@example.com: admin123

3. **Profile Picture**: Default profile picture adalah 'avatar.png'

4. **BMR Calculation**:

    - Laki-laki: 66.5 + (13.7 × weight) + (5 × height) - (6.8 × age)
    - Perempuan: 655 + (9.6 × weight) + (1.8 × height) - (4.7 × age)

5. **Nutrition Data**: Semua data nutrisi dalam list_food dihitung per 100 gram

## Troubleshooting

### Error: "SQLSTATE[42S01]: Base table or view already exists"

Solusi: Jalankan `php artisan migrate:fresh` untuk drop semua tabel dan buat ulang

### Error: "Class 'Database\Seeders\UserSeeder' not found"

Solusi: Jalankan `composer dump-autoload` kemudian coba lagi

### Error foreign key constraint

Pastikan urutan migration sudah benar. Migration harus dijalankan dalam urutan:

1. users
2. list_food
3. food
4. breakfast, lunch, dinner, snack

## Referensi

-   Laravel Migration Documentation: https://laravel.com/docs/migrations
-   Laravel Seeding Documentation: https://laravel.com/docs/seeding
