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

function httpRequest($url) {
  // inisialisasi curl
  $curlInit = curl_init();
  // set opsi curl
  curl_setopt($curlInit, CURLOPT_URL, $url);
  // return the transfer as a string 
  curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, 1);
  $outputCurl = json_decode(curl_exec($curlInit), true);

  // tutup curl
  curl_close($curlInit);
  return $outputCurl;
}
