<?php

require_once '../functions.php';
if (isset($_POST['nama']) && 
    isset($_POST['alamat']) &&
    isset($_POST['kelas']) &&
    isset($_POST['jurusan']) &&
    isset($_POST['jenis_kelamin'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $jenisKelamin = $_POST['jenis_kelamin'];
    $data = [
      'nama' => $nama,
      'alamat' => $alamat,
      'kelas' => $kelas,
      'jurusan' => $jurusan,
      'jenis_kelamin' => $jenisKelamin
    ];
    $dataJson = json_encode($data);
    $tambahDataSiswa = httpRequest('http://localhost:8080/data-siswa/siswa.php', 'POST', $dataJson);
    setcookie('status', $tambahDataSiswa['status']);
    setcookie('message', $tambahDataSiswa['message']);
    redirect('index.php');
  } 
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah data siswa</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1 class="text-center text-4xl my-6">Tambah data siswa</h1>
  <a href="index.php" class="p-3 text-white bg-indigo-500 hover:bg-indigo-600 rounded ml-40">
    <!-- icon arrow back -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7 inline-block" fill="#fff">
      <path d="M0 0h24v24H0z" fill="none" />
      <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
    </svg>
    Kembali halaman utama
  </a>
  <form action="" method="POST" class="text-center -mt-6">
    <!-- nama -->
    <label for="nama" class="block -ml-44 my-1">Nama siswa</label>
    <input required type="text" name="nama" id="nama" class="input">
    <!-- alamat -->
    <label for="alamat" class="block -ml-40 my-1">Alamat siswa</label>
    <textarea name="alamat" class="input" id="alamat" cols="23" rows="3"></textarea>
    <!-- kelas -->
    <label for="kelas" class="block -ml-40 my-1">Kelas berapa ?</label>
    <input required type="number" name="kelas" id="kelas" class="input">
    <!-- jurusan -->
    <label for="jurusan" class="block -ml-28 my-1">Ambil Jurusan apa ?</label>
    <select name="jurusan" id="jurusan" class="input">
      <option value="Multi Media">Multi Media</option>
      <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
      <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
      <option value="Broadcasting">Broadcasting</option>
    </select>
    <!-- jenis kelamin -->
    <label for="jenis_kelamin" class="block -ml-40 my-1">Jenis kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="input">
      <option value="Laki-Laki">Laki-Laki</option>
      <option value="Perempuan">Perempuan</option>
    </select> <br>
    <!-- tombol submit -->
    <button type="submit" class=" px-10 p-2 text-white bg-indigo-500 hover:bg-indigo-600 mt-4 rounded ">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#fff" class="w-7 h-7 inline-block">
        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
        </path>
      </svg>
      &nbsp;
      Tambah data siswa
    </button>
  </form>
</body>

</html>