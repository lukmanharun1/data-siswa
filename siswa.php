<?php

require_once 'functions.php';

// mengambil id dari url
$id = explode('/', $_SERVER['REQUEST_URI'])[3];
if (isset($_GET['cari'])) {
  $cari = filter($_GET['cari']);
  $query = "SELECT * FROM siswa WHERE nama LIKE '%$cari%' 
    OR alamat LIKE '%$cari%' 
    OR kelas LIKE '%$cari%' 
    OR jurusan LIKE '%$cari%' 
    OR jenis_kelamin LIKE '%$cari%'";
    $cariDataSiswa = mysqli_fetch_all(query($query), MYSQLI_ASSOC);
    $data = [
      'status' => 'success',
      'data' => $cariDataSiswa,
    ];
    echo json_encode($data);
}
else if (!$id && $_SERVER['REQUEST_METHOD'] === 'GET') {
  $getAllSiswa =mysqli_fetch_all( query("SELECT * FROM siswa"), MYSQLI_ASSOC);

  $data = [
    'status' => 'success',
    'data' => $getAllSiswa
  ];
  echo json_encode($data);
} else if ($id && $_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = filter($id);
  $getAllSiswa = mysqli_fetch_all(query("SELECT * FROM siswa WHERE id = '$id'"), MYSQLI_ASSOC);
  $data = [
    'status' => 'success',
    'data' => $getAllSiswa
  ];
  echo json_encode($data);
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $requestJson = json_decode(file_get_contents('php://input'), true);
  if (empty($requestJson['nama']) && empty($requestJson['alamat']) 
      && empty($requestJson['kelas']) && empty($requestJson['jurusan']) 
      && empty($requestJson['jenis_kelamin'])) {
        $data = [
          'status' => 'error',
          'message' => [
            'nama' => 'wajib di isi',
            'alamat' => 'wajib di isi',
            'kelas' => 'wajib di isi',
            'jurusan' => 'wajib di isi',
            'jenis_kelamin' => 'wajib di isi [Laki-Laki, Perempuan]'
          ]
        ];
        echo json_encode($data);
      } else if (in_array($requestJson['jenis_kelamin'], ['Laki-Laki', 'Perempuan'])) {
        // input data siswa
        $nama = filter($requestJson['nama']);
        $alamat = filter($requestJson['alamat']);
        $kelas = filter($requestJson['kelas']);
        $jurusan = filter($requestJson['jurusan']);
        $jenis_kelamin = filter($requestJson['jenis_kelamin']);
        $query = "INSERT INTO `siswa` VALUES(NULL, '$nama', '$alamat', '$kelas', '$jurusan', '$jenis_kelamin')";
        $tambahDataSiswa = query($query);
        if ($tambahDataSiswa) {
          // berhasil di tambah
          $getTambahDataSiswa = end(mysqli_fetch_all(query("SELECT * FROM siswa WHERE nama = '$nama'"), MYSQLI_ASSOC));
          $data = [
            'status' => 'success',
            'data' => $getTambahDataSiswa,
            'message' => 'Data siswa berhasil ditambahkan'
          ];
          echo json_encode($data);
        } else {
          // data gagal di tambahkan
          $data = [
            'status' => 'error',
            'message' => 'Data siswa gagal ditambahkan'
          ];
          echo json_encode($data);
        }
      } 
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && $id) {
  $id = filter($id);
  $query = "SELECT * FROM `siswa` WHERE id = '$id'";
  $getDataSiswa = mysqli_fetch_all(query($query));
  if ($getDataSiswa) {
    // data siswa berhasil di hapus
    $query = "DELETE FROM `siswa` WHERE id = '$id'";
    $hapusDataSiswa = query($query);
    $data = [
      'status' => 'success',
      'message' => 'Data siswa berhasil dihapus'
    ];
    echo json_encode($data);
  } else {
    // data siswa gagal di hapus
    $data = [
      'status' => 'error',
      'message' => 'Data siswa gagal dihapus'
    ];
    echo json_encode($data);
  }
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT' && $id) {
  $requestJson = json_decode(file_get_contents('php://input'), true);
  $id = filter($id);
  $query = "SELECT * FROM `siswa` WHERE id = '$id'";
  $getDataSiswa = mysqli_fetch_all(query($query), MYSQLI_ASSOC)[0];

  if ($getDataSiswa) {
    // data lama
    $nama = filter($getDataSiswa['nama']);
    $alamat = filter($getDataSiswa['alamat']);
    $kelas = filter($getDataSiswa['kelas']);
    $jurusan = filter($getDataSiswa['jurusan']);
    $jenis_kelamin = filter($getDataSiswa['jenis_kelamin']);
    
    // data baru
    $updateNama = filter($requestJson['nama']);
    $updateAlamat = filter($requestJson['alamat']);
    $updateKelas = filter($requestJson['kelas']);
    $updateJurusan = filter($requestJson['jurusan']);
    $updateJenis_Kelamin = filter($requestJson['jenis_kelamin']);
    
    // cek jika null timpa ke data lama
    $updateNama === null ? $updateNama = $nama : '';
    $updateAlamat === null ? $updateAlamat = $alamat : '';
    $updateKelas === null ? $updateKelas = $kelas : '';
    $updateJurusan === null ? $updateJurusan = $jurusan : '';
    $updateJenis_Kelamin === null ? $updateJenis_Kelamin = $jenis_kelamin : '';
    $query = "UPDATE `siswa` SET 
      nama = '$updateNama',
      alamat = '$updateAlamat',
      kelas = '$updateKelas',
      jurusan = '$updateJurusan',
      jenis_kelamin = '$updateJenis_Kelamin'
      WHERE id = '$id'";
      $updateDataSiswa = query($query);
      if ($updateDataSiswa) {
        // berhasil update
        $query = "SELECT * FROM `siswa` WHERE id = '$id'";
        $getDataSiswa = mysqli_fetch_all(query($query), MYSQLI_ASSOC);
        $data = [
          'status' => 'success',
          'data' => $getDataSiswa,
          'message' => 'Data siswa berhasil di update'
        ];
        echo json_encode($data);
      } else {
        $data = [
          'status' => 'error',
          'message' => 'Data siswa gagal di update'
        ];
        echo json_encode($data);
      }
  } else {
    $data = [
      'status' => 'error',
      'message' => "Data siswa id $id tidak ditemukan"
    ];
    echo json_encode($data);
  }
} 