# Monitoring Kendaraan Perusahaan Tambang Nikel

## Deskripsi

Aplikasi web ini dirancang untuk memantau kendaraan milik perusahaan tambang nikel. Fitur utama aplikasi meliputi:

-   Konsumsi BBM
-   Jadwal Servis
-   Riwayat Pemakaian

Selain itu, aplikasi ini juga menyediakan fitur peminjaman kendaraan yang memerlukan persetujuan dari pimpinan perusahaan.

## Daftar Username dan Password

Untuk keperluan testing dan login awal, berikut adalah daftar username dan password yang dapat digunakan:

### Akun Admin

-   **Admin**
    -   Email : `admin@gmail.com`
    -   Password: `password`

### Akun Approver

-   **Head Office**

    -   Email : `headoffice@gmail.com`
    -   Password: `password`

-   **Head of Transport Responsibility**

    -   Email : `headtransport@gmail.com`
    -   Password: `password`

    -   **CEO**
    -   Email : `ceo@gmail.com`
    -   Password: `password`

## Versi Database

-   MySQL: `10.4.32 `

## Versi PHP

-   PHP: `8.2.12`

## Framework

-   Framework yang digunakan: `Laravel 11.16.0`

### Panduan Penggunaan Aplikasi

1. Registrasi/Login

-   Untuk menggunakan aplikasi, pengguna harus terlebih dahulu melakukan registrasi atau login.
-   Admin dan Pihak yang Menyetujui memiliki akses yang berbeda dalam sistem.
-   Masukkan email dan password yang telah disediakan untuk masuk ke aplikasi.

2. Dashboard Utama

-   Setelah login, pengguna akan diarahkan ke dashboard utama.
-   Di sini, admin dan approver dapat melihat grafik pemakaian kendaraan dan juga BBM secara visual.

3.  Pemesanan Kendaraan

-   Admin:

    -   Klik pada menu "Vehicle Rent->Reservation".
    -   Isi formulir pemesanan.
    -   Tentukan driver dari daftar yang tersedia dan pilih pihak yang menyetujui pemesanan.
    -   Klik "Submit" untuk mengirimkan permohonan pemesanan.

-   Pihak yang Menyetujui (Approver):
    -   Setelah berhasil login buka menu "Approver".
    -   Tinjau detail pemesanan dan pilih untuk menyetujui atau menolak permohonan.
    -   Klik "Reject" atau "Approve".

4. Fitur Lain

    - Admin dapat melihat status peminjaman (pending/approved/reject pada detail data reservasi)
    - Admin dapat melakukan aksi tambah, edit, hapus, dan melihat data kendaraan(vehicle) dan driver serta reservasi peminjaman kendaraan.
    - Admin dapat mengexport riwayat reservasi ke excel

5. Laporan Periodik

-   Pada menu dashboard admin dan approver dapat melihat grafik peminjaman, jumlah total peminjaman, dan jumlah penggunaan BBM

6. Fitur Logout

-   User dapat melakukan logout melalui menu pada navbar

## Authors

Tri Jagad Ariyani@2024
