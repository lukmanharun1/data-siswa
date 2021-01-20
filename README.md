Database: data-siswa

schema table
CREATE TABLE `siswa` (
  `id` int(9) UNSIGNED NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelas` int(2) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

