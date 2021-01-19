<?php 

require_once '../functions.php';
if (empty($_GET['id'])) {
  redirect('index.php');
} else {
  $id = filter($_GET['id']);
  // jika id siswa ada data
  $dataSiswa = httpRequest('http://localhost/data-siswa/siswa.php/' . $id)['data'][0];
  // jika id siswa tidak ada data
  if (!$dataSiswa) {
    redirect('index.php');
  } else if (isset($_POST['nama']) && 
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
    $updateDataSiswa = httpRequest('http://localhost/data-siswa/siswa.php/' . $id, 'PUT', $dataJson);
    setcookie('status', $updateDataSiswa['status']);
    setcookie('message', $updateDataSiswa['message']);
    redirect('index.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah data siswa</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/sweetalert.min.js"></script>
</head>
<body>
  <h1 class="text-center text-4xl my-6">Tambah data siswa</h1>
  <form action="" method="POST" class="text-center">
    <!-- nama -->
    <label for="nama" class="block -ml-44 my-1">Nama siswa</label>
    <input 
      required 
      type="text" 
      name="nama" 
      id="nama" 
      class="input p-2"
      value="<?= $dataSiswa['nama']; ?>"
    />
    <!-- alamat -->
    <label for="alamat" class="block -ml-40 my-1">Alamat siswa</label>
    <textarea 
      name="alamat" 
      class="input p-2" 
      id="alamat" 
      cols="23" 
      rows="3">
      <?= $dataSiswa['alamat']; ?>
    </textarea>
    <!-- kelas -->
    <label for="kelas" class="block -ml-40 my-1">Kelas berapa ?</label>
    <input 
      required 
      type="number" 
      name="kelas" 
      id="kelas" 
      class="input p-2"
      value="<?= $dataSiswa['kelas']; ?>"
    />
    <!-- jurusan -->
    <label for="jurusan" class="block -ml-28 my-1">Ambil Jurusan apa ?</label>
    <select name="jurusan" id="jurusan" class="input p-2 px-6">
      <option value="Multi Media" <?= $dataSiswa['jurusan'] === 'Multi Media' ? 'selected': ''; ?>>
        Multi Media
      </option>
      <option value="Teknik Komputer Jaringan" <?= $dataSiswa['jurusan'] === 'Teknik Komputer Jaringan' ? 'selected': ''; ?>>
        Teknik Komputer Jaringan
      </option>
      <option value="Rekayasa Perangkat Lunak" <?= $dataSiswa['jurusan'] === 'Rekayasa Perangkat Lunak' ? 'selected': ''; ?>>
        Rekayasa Perangkat Lunak
        </option>
      <option value="Broadcasting" <?= $dataSiswa['jurusan'] === 'Broadcasting' ? 'selected': ''; ?>>
        Broadcasting
      </option>
    </select>
    <!-- jenis kelamin -->
    <label for="jenis_kelamin" class="block -ml-40 my-1">Jenis kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="input p-2 px-20">
      <option value="Laki-Laki">Laki-Laki</option>
      <option value="Perempuan">Perempuan</option>
    </select> <br>
    <!-- tombol submit -->
    <button type="submit" class="p-2 px-14 text-white bg-indigo-500 hover:bg-indigo-600 mt-4 rounded">
     <svg 
      xmlns="http://www.w3.org/2000/svg" 
      viewBox="0 0 24 24" 
      class="w-7 h-7 inline-block">
        <path 
          d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" 
          fill="#fff"/>
      </svg>
      &nbsp;
      Ubah data siswa
    </button>
  </form>
</body>
</html>