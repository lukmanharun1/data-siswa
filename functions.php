<?php 

function koneksi() {
  $username = 'root';
  $password = '';
  $databaseName = 'data-siswa';
  return mysqli_connect('localhost', $username, $password, $databaseName);

}
function query($query) {
  return  mysqli_query(koneksi(), $query);
}

function filter($requst) {
  return mysqli_real_escape_string(koneksi(), htmlspecialchars($requst));
}
