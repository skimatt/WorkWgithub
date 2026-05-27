# AGENT.md

Panduan kerja sederhana untuk AI agent dan developer di project ini.

## Tujuan

Semua perubahan project harus terekam jelas di Git dan GitHub supaya agent berikutnya bisa tahu:

- pekerjaan terakhir sampai di mana;
- file apa saja yang berubah;
- alasan perubahan dibuat;
- status pekerjaan sudah selesai, belum selesai, atau perlu dilanjutkan.

Remote GitHub project:

```text
https://github.com/skimatt/WorkWgithub.git
```

## Aturan Utama

1. Selalu cek status sebelum mulai kerja:

```bash
git status --short --branch
```

2. Jangan hapus atau rollback perubahan yang tidak dibuat sendiri, kecuali user meminta dengan jelas.

3. Kerjakan perubahan dalam scope kecil dan jelas. Satu fitur atau satu perbaikan sebaiknya menjadi satu commit.

4. Setelah mengubah file, cek lagi status dan ringkasan perubahan:

```bash
git status --short
git diff --stat
```

5. Kalau perubahan sudah benar, buat commit dengan pesan yang singkat dan jelas:

```bash
git add .
git commit -m "Deskripsi singkat perubahan"
```

6. Setelah commit, push ke GitHub:

```bash
git push
```

7. Setelah push, verifikasi status bersih:

```bash
git status --short --branch
```

Status ideal setelah selesai:

```text
## main...origin/main
```

Tidak ada file modified, deleted, atau untracked.

## Format Pesan Commit

Gunakan pesan commit sederhana:

```text
Add ...
Update ...
Fix ...
Remove ...
Configure ...
```

Contoh:

```bash
git commit -m "Add agent workflow rules"
git commit -m "Update homepage layout"
git commit -m "Fix database connection config"
```

## Catatan Status Untuk Agent

Setiap selesai kerja, agent harus menyampaikan ringkasan singkat ke user:

- apa yang diubah;
- commit hash terakhir;
- apakah sudah dipush ke GitHub;
- apakah working tree bersih;
- jika ada pekerjaan yang belum selesai, sebutkan jelas.

Contoh laporan akhir:

```text
Selesai. Perubahan sudah dicommit dan dipush.
Commit: abc1234 Update homepage layout
Status: main...origin/main, working tree bersih.
```

## Aturan Branch

Untuk project sederhana ini, gunakan branch utama:

```text
main
```

Branch tambahan hanya dibuat kalau user meminta atau perubahan berisiko besar.

## File Yang Tidak Boleh Dipush

Jangan push file rahasia atau file lokal seperti:

- `.env`
- password database
- token API
- file cache
- file upload user
- folder `vendor/`

Ikuti `.gitignore` yang sudah ada.

## Checklist Sebelum Selesai

Sebelum menyatakan pekerjaan selesai:

1. Cek `git status --short --branch`.
2. Pastikan perubahan yang perlu dicatat sudah masuk commit.
3. Push commit ke GitHub.
4. Cek ulang status setelah push.
5. Laporkan commit dan status terakhir ke user.

