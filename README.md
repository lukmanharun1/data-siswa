Database: data-siswa

schema table
CREATE TABLE `siswa` (
  `id` int(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelas` int(2) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


jalankan command
npm install
composer install

untuk menginstall depedensi dari library mpdf
saya menggunakan framework tailwindcss

saya sudah buat API menggunakan PHP untuk konsumsi API menggunakan PHP
konsumsi API kalian bisa menggunakan yang lain misalnya NODE JS, EXPRESS JS, React, dan lain - lain

pembuatan API di file siswa.php data yang dikirimkan berupa json
untuk end point nya

GET http://localhost/data-siswa/siswa.php 
   (mengambil semua data siswa)
GET http://localhost/data-siswa/siswa.php/2 
   (mengambil data siswa berdasarkan id)
GET http://localhost/data-siswa/siswa.php?cari=lukman
    (mengambil semua data siswa berdasarkan pencarian,
    yaitu: nama, alamat, kelas, jurusan, jenis_kelamin)
POST http://localhost/data-siswa/siswa.php  
  (menambahkan data dikirim data JSON melalui request body)
PUT http://localhost/data-siswa/siswa.php/2 
   (mengubah data siswa bersarkan id dikirim data JSON melalui request body)
DELETE http://localhost/data-siswa/siswa.php/2 
   (hapus data siswa berdasarkan id)

Selamat mencoba
