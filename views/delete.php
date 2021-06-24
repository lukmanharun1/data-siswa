<?php 

require_once '../functions.php';

if (empty($_GET)) {
 redirect('index.php');
} else if (isset($_GET['id'])) {
  // cek apakah id sama dengan di database ?
  $id = filter($_GET['id']);
  $dataSiswa = httpRequest('http://localhost:8080/data-siswa/siswa.php/' . $id);
  if ($dataSiswa['data']) {
    $hapusDataSiswa = httpRequest('http://localhost:8080/data-siswa/siswa.php/' . $id, 'DELETE');
    setcookie('status', $hapusDataSiswa['status']);
    setcookie('message', $hapusDataSiswa['message']);
    redirect('index.php');
  } else {
    redirect('index.php');
  }
} else {
 redirect('index.php');
}

?>