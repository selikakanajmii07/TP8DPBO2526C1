# TP8DPBO2526C1
Saya Selika Kanajmi dengan NIM 2408495 mengerjakan TP 8 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan.

PENJELASAN
DESAIN DAN FUNGSI PROGRAM
1. Class Lecturer, class ini dibuat untuk mengelola data dosen seperti nama, NIDN, nomor telepon, tanggal bergabung, dan department. Class ini berisi method untuk mengambil, menambahkan, mengubah, dan menghapus data dosen dari database.
2. Class Department, class ini dibuat untuk mengelola data department, class ini memiliki method untuk menjalankan operasi CRUD pada tabel departments.
3. Class LecturerController, class ini bertugas menghubungkan model Lecturer dengan tampilan dosen, controller menerima request dari pengguna, memanggil method pada model, lalu menampilkan halaman yang sesuai.
4. Class DepartmentController, class ini bertugas mengatur proses pengelolaan data department mulai dari menampilkan, menambahkan, mengubah, hingga menghapus data.
5. Class Database, class ini dibuat untuk mengatur koneksi program dengan database MySQL.

ALUR
1. Program dijalankan melalui index.php, file ini membaca parameter halaman dan menentukan controller yang akan dipanggil.
2. Untuk melihat data dosen pengguna membuka menu Data Dosen. LecturerController mengambil data melalui model Lecturer, kemudian menampilkannya pada halaman.
3. Untuk menambahkan dosen pengguna mengisi form dan memilih department. Setelah disimpan data akan dimasukkan ke tabel lecturers.
4. Untuk mengubah dosen, pengguna memilih data yang ingin diubah kemudian mengedit informasi melalui form. Setelah disimpan data akan diperbarui di database.
5. Untuk menghapus dosen, pengguna memilih data yang ingin dihapus dan menekan tombol Delete data kemudian dihapus dari database.
6. Untuk mengelola department, pengguna membuka menu Department pengguna dapat menambahkan, mengubah, melihat, dan menghapus data department.
7. Tabel lecturers memiliki relasi dengan tabel departments melalui department_id. Satu department dapat memiliki beberapa dosen.

DOKUMENTASI
Dokumentasi ada di folder dokumentasi
