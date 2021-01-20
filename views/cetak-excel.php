<?php 

require_once '../functions.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data siswa.xls");
$i = 1;
if (isset($_GET['id'])) {
  $id = filter($_GET['id']);
  // jika id siswa ada data
  $getDataSiswa = httpRequest('http://localhost/data-siswa/siswa.php/' . $id);
  // jika id siswa tidak ada data
  if (!$getDataSiswa['data']) {
    redirect('index.php');
  } 
} else {
  // jika tidak query param id maka mengambil seluruh data
  $getDataSiswa = httpRequest('http://localhost/data-siswa/siswa.php');
}
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
    <?php foreach($getDataSiswa['data'] as $dataSiswa) : ?>
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