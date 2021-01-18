<?php 

require_once '../functions.php';
// jika tidak ada quey param di url
if (empty($_GET['id'])) {
  redirect('index.php');
} else {
  $id = filter($_GET['id']);
  // jika id siswa ada data
  $getDataSiswa = httpRequest('http://localhost/data-siswa/siswa.php/' . $id);
  // jika id siswa tidak ada data
  if (!$getDataSiswa['data']) {
    redirect('index.php');
  } 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Data Siswa</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/sweetalert.min.js"></script>
</head>

<body>
  <h1 class="text-center text-4xl my-9">Detail Data Siswa</h1>
  <div class="container">
  <!-- tambah data siswa -->
  <a href="index.php" class="p-3 text-white bg-indigo-500 hover:bg-indigo-600 mt-4 rounded mx-auto ml-72">
  <!-- icon arrow back -->
  <svg 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 24 24" 
    class="w-7 h-7 inline-block"
    fill="#fff">
    <path d="M0 0h24v24H0z" fill="none" />
    <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
  </svg>
  Kembali halaman utama
  </a>
  <!-- list data siswa -->
  <?php foreach($getDataSiswa['data'] as $dataSiswa) : ?>
    <ul class="m-4 border border-solid border-indigo-400 rounded w-7/12 mx-auto bg-indigo-200 divide-opacity-75">
      <li class="ml-5 my-3">
      <!-- nama siswa -->
      Nama: <p class="font-semibold inline text-indigo-500">
              <?= $dataSiswa['nama']; ?>
            </p>
      </li>
      <li class="ml-5 my-3">
      <!-- nama alamat siswa -->
      Alamat: <p class="font-semibold inline text-indigo-500">
              <?= $dataSiswa['alamat']; ?>
            </p>
      </li>
      <li class="ml-5 my-3">
      <!-- kelas -->
      Kelas: <p class="font-semibold inline text-indigo-500">
              <?= $dataSiswa['kelas']; ?>
            </p>
      </li>
      <li class="m-3 ml-5">
      <!-- jurusan -->
        Jurusan: <p class="font-semibold inline text-indigo-500">
                  <?= $dataSiswa['jurusan']; ?>
                </p>
      </li>
      <li class="ml-5 my-3">
      <!-- jenis kelamin siswa -->
      Jenis kelamin: <p class="font-semibold inline text-indigo-500">
              <?= $dataSiswa['jenis_kelamin']; ?>
            </p>
      </li>
      <li class="m-3 ml-5">
      <!-- aksi tombol detail, update, delete -->
        Aksi:
        <a
          href="update.php?id=<?= $dataSiswa['id']; ?>" 
          class="bg-blue-600 hover:bg-blue-500 ml-2 p-2 pb-3 rounded">
          <!-- icon update -->
          <svg 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            class="w-7 h-7 inline-block">
            <path 
              d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" 
              fill="#fff"/>
          </svg>
        </a>
        <a
          href="delete.php?id=<?= $dataSiswa['id']; ?>" 
          class="text-white bg-red-500 hover:bg-red-400 ml-2 p-2 pb-3 rounded">
          <!-- icon delete -->
          <svg 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 448 512" 
            class="w-7 h-7 inline-block" 
            fill="#fff">
            <path 
              d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z">
            </path>
          </svg>
        </a>
      </li>
    </ul>
    <?php endforeach; ?>
  </div>
</body>

</html>

