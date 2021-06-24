<?php 

require_once '../functions.php';
$getAllDataSiswa = httpRequest('http://localhost:8080/data-siswa/siswa.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Siswa</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/sweetalert.min.js"></script>
</head>

<body>
  <?php 
    if (isset($_COOKIE['status']) && isset($_COOKIE['message'])) {
      $status = $_COOKIE['status'];
      $message = $_COOKIE['message'];
      echo "<script>
              swal('$status', '$message', '$status');
            </script>";
      // hapus cookie
      setcookie('status', '');
      setcookie('message', '');
    }
  ?>
  <h1 class="text-center text-4xl my-9">Data Siswa</h1>
  <div class="container">
  <!-- tambah data siswa -->
  <a href="tambah.php" class="p-3 text-white bg-indigo-500 hover:bg-indigo-600 mt-4 rounded mx-auto ml-60">
  <!-- icon tambah -->
  <svg 
    xmlns="http://www.w3.org/2000/svg" 
    viewBox="0 0 448 512"
    fill="#fff"
    class="w-7 h-7 inline-block">
    <path 
      d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
    </path>
  </svg>
  Tambah data siswa
  </a>
  <!-- cetak pdf -->
  <a href="cetakpdf.php" target="_blank">
    <svg 
      viewBox="0 0 384 512"
      class="w-9 h-9 inline-block ml-2"
      fill="#6366F1">
      <path
        d="M181.9 256.1c-5-16-4.9-46.9-2-46.9 8.4 0 7.6 36.9 2 46.9zm-1.7 47.2c-7.7 20.2-17.3 43.3-28.4 62.7 18.3-7 39-17.2 62.9-21.9-12.7-9.6-24.9-23.4-34.5-40.8zM86.1 428.1c0 .8 13.2-5.4 34.9-40.2-6.7 6.3-29.1 24.5-34.9 40.2zM248 160h136v328c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V24C0 10.7 10.7 0 24 0h200v136c0 13.2 10.8 24 24 24zm-8 171.8c-20-12.2-33.3-29-42.7-53.8 4.5-18.5 11.6-46.6 6.2-64.2-4.7-29.4-42.4-26.5-47.8-6.8-5 18.3-.4 44.1 8.1 77-11.6 27.6-28.7 64.6-40.8 85.8-.1 0-.1.1-.2.1-27.1 13.9-73.6 44.5-54.5 68 5.6 6.9 16 10 21.5 10 17.9 0 35.7-18 61.1-61.8 25.8-8.5 54.1-19.1 79-23.2 21.7 11.8 47.1 19.5 64 19.5 29.2 0 31.2-32 19.7-43.4-13.9-13.6-54.3-9.7-73.6-7.2zM377 105L279 7c-4.5-4.5-10.6-7-17-7h-6v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-74.1 255.3c4.1-2.7-2.5-11.9-42.8-9 37.1 15.8 42.8 9 42.8 9z">
      </path>
    </svg>
  </a>
  <!-- cetak ms excel -->
  <a href="cetak-excel.php" target="_blank">
  <svg
     xmlns="http://www.w3.org/2000/svg" 
     viewBox="0 0 384 512"
     class="w-9 h-9 inline-block ml-2"
    fill="#6366F1">
    <path  d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm60.1 106.5L224 336l60.1 93.5c5.1 8-.6 18.5-10.1 18.5h-34.9c-4.4 0-8.5-2.4-10.6-6.3C208.9 405.5 192 373 192 373c-6.4 14.8-10 20-36.6 68.8-2.1 3.9-6.1 6.3-10.5 6.3H110c-9.5 0-15.2-10.5-10.1-18.5l60.3-93.5-60.3-93.5c-5.2-8 .6-18.5 10.1-18.5h34.8c4.4 0 8.5 2.4 10.6 6.3 26.1 48.8 20 33.6 36.6 68.5 0 0 6.1-11.7 36.6-68.5 2.1-3.9 6.2-6.3 10.6-6.3H274c9.5-.1 15.2 10.4 10.1 18.4zM384 121.9v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z">
    </path>
  </svg>
  </a>
  <input 
    type="text" 
    placeholder="cari nama, jurusan, kelas, alamat kelas, jurusan, jenis kelamin"
    class="input p-2 ml-5" style="width: 460px;" id="cari">
  <!-- list data siswa -->
    <div class="list-container">
  <?php foreach($getAllDataSiswa['data'] as $dataSiswa) : ?>
      <ul class="m-4 border border-solid border-indigo-400 rounded w-7/12 mx-auto bg-indigo-200 divide-opacity-75">
        <li class="ml-5 my-3">
        <!-- nama siswa -->
        Nama: <p class="font-semibold inline text-indigo-500">
                <?= $dataSiswa['nama']; ?>
              </p>
        </li>
        <li class="m-3 ml-5">
        <!-- jurusan -->
          Jurusan: <p class="font-semibold inline text-indigo-500">
                    <?= $dataSiswa['jurusan']; ?>
                  </p>
        </li>
        <li class="m-3 ml-5">
        <!-- aksi tombol detail, update, delete -->
          Aksi:
          <a
            href="detail.php?id=<?= $dataSiswa['id']; ?>" 
            class="bg-blue-400 hover:bg-blue-500 p-2 pb-3 rounded">
            <!-- icon detail -->
            <svg 
              xmlns="http://www.w3.org/2000/svg" 
              viewBox="0 0 512 512" 
              class="w-7 h-7 inline-block" 
              fill="#fff">
              <path 
                d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z">
                </path>
            </svg>
            
          </a>
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
            class="text-white bg-red-500 hover:bg-red-400 ml-2 p-2 pb-3 rounded tombol-hapus">
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
  </div>
  <script src="js/script.js"></script>
</body>

</html>