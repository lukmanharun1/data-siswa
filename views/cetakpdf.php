<?php 

require_once '../functions.php';
require_once '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
if (isset($_GET['id'])) {
  $id = filter($_GET['id']);
  // jika id siswa ada data
  $getDataSiswa = httpRequest('http://localhost/data-siswa/siswa.php/' . $id);
  $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <style>
          body {
            font-family:
              system-ui,
              -apple-system,
              /* Firefox supports this but not yet `system-ui` */
              "Segoe UI",
              Roboto,
              Helvetica,
              Arial,
              sans-serif,
              "Apple Color Emoji",
              "Segoe UI Emoji";
          }
          h2 {
            text-align: center;
          }
            ul {
              padding: 5px;
              border-radius: 0.25rem;
              background-color: rgb(199, 210, 254);
              opacity: .75;
              border: 1px solid rgba(129, 140, 248, 1);
            }
            ul li {
              list-style: none;
              display: inline;
              margin-left: 1.25rem;
              margin-top: 0.75rem;
            }
            ul li b {
              color: rgb(99, 102, 241);
            }
          </style>
          <title>Data siswa</title>
        </head>
        <body>
          <h2>Detail Data siswa</h2>';

  foreach($getDataSiswa['data'] as $dataSiswa) {
    $html .= '<ul>
                <li>
                  Nama: <b>
                          '. $dataSiswa['nama'] .'
                        </b>
                </li>
                <li>
                  Alamat: <b>
                          '. $dataSiswa['alamat'] .'
                        </b>
                </li>
                <li>
                  Kelas: <b>
                          '. $dataSiswa['kelas'] .'
                        </b>
                </li>
                <li>
                  Jurusan: <b>
                            '. $dataSiswa['jurusan'] .'
                          </b>
                </li>
                <li>
                  Jenis kelamin: <b>
                          '. $dataSiswa['jenis_kelamin'] .'
                        </b>
                </li>
              </ul>';
  }

      $html .= '</body>
                </html>';
  $mpdf->WriteHTML($html);
  $mpdf->Output();
  // jika id siswa tidak ada data
  if (!$getDataSiswa['data']) {
    redirect('index.php');
  } 
} else {
$getAllDataSiswa = httpRequest('http://localhost/data-siswa/siswa.php');

$html = '<!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <style>
          body {
            font-family:
              system-ui,
              -apple-system,
              /* Firefox supports this but not yet `system-ui` */
              "Segoe UI",
              Roboto,
              Helvetica,
              Arial,
              sans-serif,
              "Apple Color Emoji",
              "Segoe UI Emoji";
          }
          h2 {
            text-align: center;
          }
            ul {
              padding: 5px;
              border-radius: 0.25rem;
              background-color: rgb(199, 210, 254);
              opacity: .75;
              border: 1px solid rgba(129, 140, 248, 1);
            }
            ul li {
              list-style: none;
              display: inline;
              margin-left: 1.25rem;
              margin-top: 0.75rem;
            }
            ul li b {
              color: rgb(99, 102, 241);
            }
          </style>
          <title>Data siswa</title>
        </head>
        <body>
          <h2>Details Data siswa</h2>';

  foreach($getAllDataSiswa['data'] as $dataSiswa) {
    $html .= '<ul>
                <li>
                  Nama: <b>
                          '. $dataSiswa['nama'] .'
                        </b>
                </li>
                <li>
                  Alamat: <b>
                          '. $dataSiswa['alamat'] .'
                        </b>
                </li>
                <li>
                  Kelas: <b>
                          '. $dataSiswa['kelas'] .'
                        </b>
                </li>
                <li>
                  Jurusan: <b>
                            '. $dataSiswa['jurusan'] .'
                          </b>
                </li>
                <li>
                  Jenis kelamin: <b>
                          '. $dataSiswa['jenis_kelamin'] .'
                        </b>
                </li>
              </ul>';
  }

      $html .= '</body>
                </html>';
  $mpdf->WriteHTML($html);
  $mpdf->Output();
}