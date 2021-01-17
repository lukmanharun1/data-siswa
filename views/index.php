<?php 

require_once '../functions.php';

$getAllDataSiswa = httpRequest('http://localhost/data-siswa/siswa.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Siswa</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1 class="text-center text-4xl mt-9">Data Siswa</h1>
  <div class="container">
  <?php foreach($getAllDataSiswa['data'] as $dataSiswa) : ?>
    <ul class="m-4 border border-solid border-indigo-400 rounded w-7/12 mx-auto bg-indigo-200 divide-opacity-75">
      <li class="ml-5 my-3">
      Nama: <p class="font-semibold inline text-indigo-500">
              <?= $dataSiswa['nama']; ?>
            </p>
      </li>
      <li class="m-3 ml-5">
        Jurusan: <p class="font-semibold inline text-indigo-500">
                  <?= $dataSiswa['jurusan']; ?>
                </p>
      </li>
      <li class="m-3 ml-5">
        Aksi:
        <a 
          href="detail.php?id=<?= $dataSiswa['id']; ?>" 
          class="text-white bg-blue-400 p-2 rounded">
          Detail
        </a>
        <a 
          href="detail.php?id=<?= $dataSiswa['id']; ?>" 
          class="text-white bg-blue-600 ml-2 p-2 rounded">
          Update
        </a>
      </li>
    </ul>
    <?php endforeach; ?>
  </div>
</body>

</html>