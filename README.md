# CI4

## Hello World

Project belajar kerja tim menggunakan GitHub dan CodeIgniter 4.

## Tugas Aktif

### 1. Connect Database Laragon dan Konfigurasi CI4

Status: `Open`

Kerjakan setup database lokal menggunakan Laragon MySQL, lalu konfigurasi CodeIgniter 4 supaya aplikasi bisa membaca database dari file `.env`.

Detail task lengkap ada di:

[docs/issues/001-connect-laragon-database-configure-ci4.md](docs/issues/001-connect-laragon-database-configure-ci4.md)

Checklist utama:

- Jalankan Laragon dan aktifkan MySQL.
- Buat database `myapp_ci4`.
- Copy `env` menjadi `.env`.
- Set `CI_ENVIRONMENT = development`.
- Konfigurasi `database.default.*` untuk MySQL Laragon.
- Verifikasi dengan `php spark config:check App`.
- Verifikasi dengan `php spark config:check Database`.
- Jalankan aplikasi dengan `php spark serve`.

## Aturan Kerja

Baca [AGENT.md](AGENT.md) sebelum mulai kerja supaya status, commit, dan push ke GitHub terekam rapi.
