# Issue: Connect Database Laragon dan Konfigurasi CodeIgniter 4

## Ringkasan

Setup koneksi database lokal menggunakan Laragon MySQL, lalu konfigurasi CodeIgniter 4 supaya aplikasi bisa membaca database dari file `.env`.

## Tujuan

Anak-anak yang mengerjakan project ini harus bisa menjalankan aplikasi CI4 secara lokal dengan database MySQL Laragon yang aktif dan konfigurasi yang aman untuk development.

## Scope Pekerjaan

- Pastikan Laragon berjalan dan service MySQL aktif.
- Buat database lokal untuk project ini.
- Buat file `.env` dari file contoh `env`.
- Konfigurasi environment CI4 ke mode development.
- Konfigurasi koneksi database default CI4.
- Verifikasi koneksi database menggunakan command CI4.
- Dokumentasikan nama database dan langkah setup singkat.

## Langkah Teknis

1. Jalankan Laragon.
2. Start service Apache/Nginx dan MySQL.
3. Buat database baru di Laragon/MySQL.

   Rekomendasi nama database:

   ```text
   myapp_ci4
   ```

4. Copy file `env` menjadi `.env`.

   ```bash
   copy env .env
   ```

5. Update konfigurasi `.env`.

   ```ini
   CI_ENVIRONMENT = development

   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = myapp_ci4
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.DBPrefix =
   database.default.port = 3306
   ```

6. Jangan commit file `.env` karena berisi konfigurasi lokal.
7. Verifikasi konfigurasi CI4.

   ```bash
   php spark config:check App
   php spark config:check Database
   ```

8. Jalankan server lokal.

   ```bash
   php spark serve
   ```

9. Buka aplikasi di browser.

   ```text
   http://localhost:8080
   ```

## Acceptance Criteria

- Laragon MySQL aktif.
- Database `myapp_ci4` sudah dibuat.
- File `.env` lokal sudah ada dan tidak masuk Git.
- `CI_ENVIRONMENT` bernilai `development`.
- Konfigurasi `database.default.*` sudah mengarah ke Laragon MySQL.
- Command `php spark config:check App` berhasil.
- Command `php spark config:check Database` berhasil.
- Aplikasi bisa dijalankan dengan `php spark serve`.
- Tidak ada password/token rahasia yang dipush ke GitHub.

## Catatan Untuk Pull Request

Saat membuat PR atau laporan kerja, tulis:

- database yang dipakai;
- command verifikasi yang sudah dijalankan;
- error yang muncul jika belum berhasil;
- screenshot atau teks bukti aplikasi bisa jalan jika ada.

## Label GitHub Yang Disarankan

```text
setup
database
codeigniter4
laragon
good-first-issue
```

