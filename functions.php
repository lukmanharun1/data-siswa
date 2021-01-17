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

function httpRequest($url, $requstMethod = 'GET', $json = '') {
  // inisialisasi curl
  $curlInit = curl_init();
  // set opsi curl
  curl_setopt($curlInit, CURLOPT_URL, $url);
  curl_setopt($curlInit, CURLOPT_POSTFIELDS, $json);

  //set the content type to application/json
  curl_setopt($curlInit, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
  // custom request method
  curl_setopt($curlInit, CURLOPT_CUSTOMREQUEST, $requstMethod);
  // return the transfer as a string 
  curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, 1);
  $outputCurl = json_decode(curl_exec($curlInit), true);

  // tutup curl
  curl_close($curlInit);
  return $outputCurl;
}

function redirect($url) {
  header('location: ' . $url);
}