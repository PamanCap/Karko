# Karko - Kar (car) Ko (go)
Karko adalah aplikasi berbasis web untuk manajemen peminjaman kendaraan perusahaan. Sistem ini menyediakan fitur pengelolaan kendaraan, driver, booking kendaraan, approval bertingkat, pencatatan penggunaan bahan bakar, serta riwayat service kendaraan.

## Tech Stack

- Framework : Laravel 12
- PHP Version : PHP 8.3+
- Database : MySQL 10.4+
- Frontend : Blade Template + Tailwind CSS
- Authentication : Laravel Breeze
- Chart Library : Chart.js


## Database Information

Database yang digunakan:

```text
Database Name : karko
Database Type : MySQL
```

Versi database:

```text
MySQL Version : 10.x
```

Daftar tabel:

```text
users

- id
- name
- email
- password
- phone_number
- role


vehicles

- id
- plate_number
- brand
- type
- ownership
- service_date
- status


drivers

- id
- name
- phone_number
- status


bookings

- id
- vehicle_id
- driver_id
- request_date
- start_date
- end_date
- purpose
- status
- created_by


approvals

- id
- booking_id
- approver_id
- level
- status


fuel_logs

- id
- vehicle_id
- date
- liter
- cost
- receipt_image
- created_by


services

- id
- vehicle_id
- date
- description
- cost
- status
```

---

# User Account

Default user yang tersedia dari Seeder:

## Admin

```text
Email    : admin@gmail.com
Password : password

Role     : Admin
```

Hak akses:

- Dashboard monitoring kendaraan
- Kelola kendaraan
- Kelola driver
- Membuat booking kendaraan
- Melihat status approval
- Menyelesaikan booking kendaraan
- Mencatat penggunaan BBM
- Mengelola service kendaraan
- Download laporan penggunaan kendaraan


---

## Approver Level 1

```text
Email    : supervisor@gmail.com
Password : password

Role     : Approver
```

Hak akses:

- Melihat request approval
- Approve booking level 1
- Reject booking
- Melihat history approval


---

## Approver Level 2

```text
Email    : manager@gmail.com
Password : password

Role     : Approver
```

Hak akses:

- Melihat request approval
- Approve booking level 2
- Reject booking
- Melihat history approval



---

# Cara Install Project

Clone repository:

```bash
git clone <repository-url>
```

Masuk folder:

```bash
cd karko
```

Install dependency Laravel:

```bash
composer install
```

Install dependency frontend:

```bash
npm install
```

Copy environment:

```bash
cp .env.example .env
```

Generate key:

```bash
php artisan key:generate
```

Setting database pada `.env`

```env
DB_DATABASE=karko
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration dan seeder:

```bash
php artisan migrate --seed
```

Jalankan Laravel:

```bash
php artisan serve
```

Jalankan Vite:

```bash
npm run dev
```

Akses aplikasi:

```text
http://127.0.0.1:8000
```

---

Physical Data model & Activity Diagram
https://drive.google.com/file/d/14fUmwV6M_BoFIwTUGOzcZa4H3JDFXe5A/view?usp=drive_link
https://drive.google.com/file/d/1alG1MMmhILAlL0CiPf3dz0I6q5WHb4dn/view?usp=drive_link

---

# Developer

Project dibuat menggunakan Laravel sebagai sistem manajemen booking kendaraan berbasis role Admin dan Approver.
