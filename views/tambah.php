<?php 

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
    $tambahDataSiswa = httpRequest('http://localhost/data-siswa/siswa.php', 'POST', $dataJson);
    var_dump($tambahDataSiswa);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah data siswa</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/sweetalert.min.js"></script>
</head>
<body>
  <h1 class="text-center text-4xl my-6">Tambah data siswa</h1>
  <form action="" method="POST" class="text-center">
    <!-- nama -->
    <label for="nama" class="block -ml-44 my-1">Nama siswa</label>
    <input required type="text" name="nama" id="nama" class="input p-2">
    <!-- alamat -->
    <label for="alamat" class="block -ml-40 my-1">Alamat siswa</label>
    <textarea name="alamat" class="input p-2" id="alamat" cols="23" rows="3"></textarea>
    <!-- kelas -->
    <label for="kelas" class="block -ml-40 my-1">Kelas berapa ?</label>
    <input required type="number" name="kelas" id="kelas" class="input p-2">
    <!-- jurusan -->
    <label for="jurusan" class="block -ml-28 my-1">Ambil Jurusan apa ?</label>
    <select name="jurusan" id="jurusan" class="input p-2 px-6">
      <option value="Multi Media">Multi Media</option>
      <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
      <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
      <option value="Broadcasting">Broadcasting</option>
    </select>
    <!-- jenis kelamin -->
    <label for="jenis_kelamin" class="block -ml-28 my-1">Jenis kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="input p-2 px-20">
      <option value="Laki-Laki">Laki-Laki</option>
      <option value="Perempuan">Perempuan</option>
    </select> <br>
    <!-- tombol submit -->
    <button type="submit" class="p-2 px-11 text-white bg-indigo-500 hover:bg-indigo-600 mt-4 rounded ">
      <svg 
      xmlns="http://www.w3.org/2000/svg" 
      viewBox="0 0 448 512"
      fill="#fff"
      class="w-7 h-7 inline-block">
      <path 
        d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
      </path>
      </svg>
      &nbsp;
      Tambah data siswa
    </button>
  </form>
</body>
</html>