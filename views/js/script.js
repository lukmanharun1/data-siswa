const tombolHapus = document.querySelectorAll(".tombol-hapus");
const cari = document.getElementById("cari");
tombolHapus.forEach((hapus) => {
  hapus.addEventListener("click", (event) => {
    event.preventDefault();
    swal({
      title: "Yakin?",
      text: "Apakah anda ingin menghapus data ini",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        document.location.href = hapus.href;
      }
    });
  });
});

// cari data siswa
cari.addEventListener("keyup", (event) => {
  const hasilCari = cari.value;
  fetch(`http://localhost:8080/data-siswa/siswa.php?cari=${hasilCari}`)
    .then((response) => response.json())
    .then((response) => {
      const hasilDataCari = response.data;
      let dataCari = "";
      hasilDataCari.forEach((data) => {
        dataCari += `<ul class="m-4 border border-solid border-indigo-400 rounded w-7/12 mx-auto bg-indigo-200 divide-opacity-75">
                      <li class="ml-5 my-3">
                      <!-- nama siswa -->
                      Nama: <p class="font-semibold inline text-indigo-500">
                              ${data.nama}
                            </p>
                      </li>
                      <li class="m-3 ml-5">
                      <!-- jurusan -->
                        Jurusan: <p class="font-semibold inline text-indigo-500">
                                 ${data.jurusan}
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
                          href="update.php?id=${data.id}" 
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
                          href="delete.php?id=${data.id}" 
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
                    </ul>`;
      });
      const listContainer = document.querySelector(".list-container");
      listContainer.innerHTML = dataCari;
    })
    .catch((error) => console.log(error));
});
