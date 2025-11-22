# Teacher Evaluation System

## Deskripsi

Sistem Evaluasi Pengajar adalah aplikasi web berbasis Laravel yang dirancang untuk memudahkan siswa memberikan penilaian terhadap guru/dosen mengenai kualitas pengajaran, penyampaian materi, kedisiplinan, dan kepuasan belajar secara keseluruhan. Sistem ini membantu sekolah/kampus dalam mengumpulkan feedback otomatis, menganalisis performa pengajar, dan menghasilkan laporan yang akurat untuk perbaikan kualitas pembelajaran.

Aplikasi ini menggantikan metode manual seperti kertas atau Google Form dengan solusi terintegrasi yang mudah diakses, aman, dan dapat dianalisis secara real-time.

## Fitur Utama

### Untuk Siswa

- **Login dan Autentikasi**: Akses aman ke sistem.
- **Pilih Mata Pelajaran**: Melihat daftar kursus yang dapat dievaluasi.
- **Isi Evaluasi**: Formulir dengan 25 pertanyaan rating (1-4) dibagi dalam 5 section:
  - Penilaian Pengajar
  - Penilaian Materi
  - Penilaian Proses Pembelajaran
  - Penilaian Media dan Sumber Belajar
  - Penilaian Hasil dan Manfaat Pembelajaran
- **Komentar Tambahan**: Opsional untuk feedback lebih lanjut.
- **Cek Status**: Melihat apakah evaluasi sudah disubmit.

### Untuk Guru/Dosen

- **Login dan Autentikasi**: Akses pribadi.
- **Ringkasan Evaluasi**: Rata-rata nilai per indikator.
- **Komentar Siswa**: Melihat feedback tekstual.
- **Grafik Performa**: Visualisasi hasil evaluasi.

### Untuk Admin

- **Manajemen Data**: Kelola pengguna (siswa, guru), kursus, dan pendaftaran siswa.
- **Dashboard**: Grafik dan statistik evaluasi keseluruhan.
- **Laporan**: Melihat dan export laporan evaluasi ke PDF/Excel.
- **Export Data**: Export data kursus dan evaluasi beserta siswa terkait.

## Teknologi yang Digunakan

- **Framework**: Laravel 12
- **Admin Panel**: Filament v4
- **Database**: MySQL
- **Authentication**: Laravel Sanctum / Filament Auth
- **Permissions**: Spatie Laravel Permission
- **Frontend**: Blade Templates, Tailwind CSS (via Filament)
- **Charts**: Chart.js (via Filament Widgets)
- **Export**: Laravel Excel / Filament Exporters

## Instalasi

1. **Clone Repository**:

   ```bash
   git clone https://github.com/ahnafi/tes.git
   cd tes
   ```

2. **Install Dependencies**:

   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**:
   - Copy `.env.example` ke `.env`
   - Atur database connection di `.env`

4. **Migrasi dan Seed Database**:

   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Generate Key dan Storage Link**:

   ```bash
   php artisan key:generate
   php artisan storage:link
   ```

6. **Jalankan Aplikasi**:

   ```bash
   php artisan serve
   npm run dev
   ```

Akses aplikasi di `http://localhost:8000/admin` untuk panel admin.

## Penggunaan

1. **Login sebagai Admin**: Kelola data pengguna, kursus, dan lihat dashboard.
2. **Login sebagai Siswa**: Pilih kursus dan isi evaluasi.
3. **Login sebagai Guru**: Lihat hasil evaluasi pribadi.

## Struktur Database

- **Users**: Data pengguna (admin, student, teacher).
- **Courses**: Daftar kursus dengan teacher_id.
- **Student_Enrollments**: Relasi siswa ke kursus.
- **Evaluations**: Header evaluasi per siswa per kursus.
- **Evaluation_Answers**: Jawaban rating untuk 25 pertanyaan.

## Kontribusi

Kontribusi sangat diterima! Silakan fork repository ini, buat branch fitur baru, dan submit pull request.

