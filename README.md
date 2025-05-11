# Tugas Praktikum MVP

## Janji
Saya Muhammad Bintang Eighista dengan NIM 2304137 mengerjakan TP 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi Program
Sistem ini adalah aplikasi berbasis PHP yang digunakan untuk mengelola data mahasiswa. Aplikasi ini mendukung operasi CRUD (Create, Read, Update, Delete) untuk tabel mahasiswa, termasuk kolom email dan telepon.

## Desain Program
Program ini menggunakan arsitektur Model-View-Presenter (MVP) untuk memisahkan logika bisnis dari tampilan. Berikut adalah komponen utama dari sistem:

1. **Model**: 
   - `DB.class.php`: Kelas untuk mengelola koneksi database dan eksekusi query.
   - `Mahasiswa.class.php`: Kelas yang merepresentasikan entitas mahasiswa dengan atribut-atributnya.
   - `TabelMahasiswa.class.php`: Kelas yang berisi metode untuk berinteraksi dengan tabel mahasiswa di database.

2. **Presenter**:
   - `KontrakPresenter.php`: Interface yang mendefinisikan metode yang harus diimplementasikan oleh presenter.
   - `ProsesMahasiswa.php`: Kelas yang mengimplementasikan logika untuk memproses data mahasiswa, termasuk operasi CRUD.

3. **View**:
   - `TampilMahasiswa.php`: Kelas yang bertanggung jawab untuk menampilkan data mahasiswa dan menangani interaksi pengguna.
   - `KontrakView.php`: Interface yang mendefinisikan metode yang harus diimplementasikan oleh view.

4. **Template**:
   - `Template.class.php`: Kelas untuk mengelola tampilan HTML dan mengganti placeholder dengan data yang sesuai.
   - `skin.html`: Template HTML yang digunakan untuk menampilkan data mahasiswa.

## Alur Program
1. **Menampilkan Data Mahasiswa**: 
   - Ketika pengguna mengakses aplikasi, data mahasiswa akan ditampilkan dalam bentuk tabel. Tabel ini mencakup kolom NIM, Nama, Tempat, Tanggal Lahir, Gender, Email, dan Telepon.

2. **Menambah Data Mahasiswa**:
   - Pengguna dapat menambahkan data mahasiswa baru dengan mengklik tombol "Tambah Data Mahasiswa". Formulir akan muncul untuk mengisi informasi mahasiswa.

3. **Mengedit Data Mahasiswa**:
   - Pengguna dapat mengedit data mahasiswa yang ada dengan mengklik tombol "Edit" di samping data yang ingin diubah. Formulir akan terisi dengan data yang ada dan pengguna dapat melakukan perubahan.

4. **Menghapus Data Mahasiswa**:
   - Pengguna dapat menghapus data mahasiswa dengan mengklik tombol "Hapus". Konfirmasi akan ditampilkan untuk memastikan bahwa pengguna ingin menghapus data tersebut.

## Dokumentasi
![image](https://github.com/user-attachments/assets/b01306f6-28ca-4154-b19b-e39e56012644)

![image](https://github.com/user-attachments/assets/45dc5b13-44ea-4474-b6d2-45badf7f71a0)

![image](https://github.com/user-attachments/assets/525825a8-efe1-4bff-a1fd-01af6f798f90)

![image](https://github.com/user-attachments/assets/4d7574ff-6418-43e0-8c5b-15b412a22b3d)
