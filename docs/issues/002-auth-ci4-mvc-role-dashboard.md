# Issue #3: Auth CI4 (Best MVC), Role Check, dan Landing Dashboard per Role

## Deskripsi

Implementasi autentikasi aplikasi menggunakan pola MVC CodeIgniter 4 yang rapi, termasuk:

- login & logout;
- pengecekan role user;
- redirect user ke dashboard sesuai role masing-masing.

Role yang dipakai:

- `admin`
- `peserta`

## Tujuan

Menyediakan fondasi autentikasi yang aman dan konsisten agar flow aplikasi berikutnya tinggal melanjutkan fitur bisnis.

## Scope Pekerjaan

- Buat tabel users (sudah tersedia dari issue sebelumnya, gunakan sebagai sumber auth).
- Buat controller auth (`Auth` / `Login`) sesuai pola CI4.
- Buat model users untuk query user berdasarkan email.
- Validasi input login.
- Verifikasi password menggunakan hash (`password_verify`).
- Simpan session login (`user_id`, `name`, `email`, `role`, `is_logged_in`).
- Middleware/filter untuk proteksi route:
  - hanya guest boleh akses halaman login;
  - hanya user login boleh akses dashboard;
  - dashboard admin hanya untuk role `admin`;
  - dashboard peserta hanya untuk role `peserta`.
- Buat routing terpisah untuk:
  - `/login`
  - `/logout`
  - `/admin/dashboard`
  - `/peserta/dashboard`
- Redirect setelah login:
  - `admin` -> `/admin/dashboard`
  - `peserta` -> `/peserta/dashboard`
- Jika role tidak valid: logout paksa + redirect ke login.

## Struktur Disarankan (MVC)

- `app/Controllers/Auth.php`
- `app/Controllers/Admin/Dashboard.php`
- `app/Controllers/Peserta/Dashboard.php`
- `app/Models/UserModel.php`
- `app/Filters/AuthFilter.php`
- `app/Filters/GuestFilter.php`
- `app/Filters/RoleFilter.php`
- `app/Views/auth/login.php`
- `app/Views/admin/dashboard.php`
- `app/Views/peserta/dashboard.php`

## Acceptance Criteria

- User bisa login dengan email + password valid.
- Password disimpan dalam bentuk hash (bukan plaintext).
- Session login tersimpan dan dipakai untuk authorize route.
- User `admin` tidak bisa masuk dashboard peserta.
- User `peserta` tidak bisa masuk dashboard admin.
- User yang belum login tidak bisa akses dashboard.
- Redirect login sesuai role berjalan konsisten.
- Logout menghapus session dan kembali ke halaman login.

## Catatan Implementasi

- Gunakan validasi bawaan CI4.
- Hindari query langsung di controller; gunakan model.
- Gunakan filter di route group supaya kontrol akses terpusat.
- Gunakan pesan error login yang aman (jangan bocorkan detail akun).

## Definition of Done

- Kode auth dan role-based landing sudah jalan di lokal.
- Route protection sudah diverifikasi manual.
- Commit + push ke branch utama.
- Issue diupdate dengan ringkasan command verifikasi.

