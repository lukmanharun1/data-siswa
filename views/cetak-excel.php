<?php 

require_once '../functions.php';
$getAllDataSiswa = httpRequest('http://localhost/data-siswa/siswa.php');

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data siswa.xls");
$i = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data siswa</title>
  <style>
    thead {
      background-color: blue;
      color: white;
    }
  </style>
</head>
<body>
  <h1>Data siswa</h1>
  <table cellspacing="0" cellpadding="5" border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Jenis kelamin</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($getAllDataSiswa['data'] as $dataSiswa) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $dataSiswa['nama']; ?></td>
        <td><?= $dataSiswa['alamat']; ?></td>
        <td><?= $dataSiswa['kelas']; ?></td>
        <td><?= $dataSiswa['jurusan']; ?></td>
        <td><?= $dataSiswa['jenis_kelamin']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>