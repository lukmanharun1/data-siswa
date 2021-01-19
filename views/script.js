const tombolHapus = document.querySelectorAll('.tombol-hapus');
tombolHapus.forEach(hapus => {
  hapus.addEventListener('click', event => {
    event.preventDefault();
    swal({
        title: "Yakin?",
        text: "Apakah anda ingin menghapus data ini",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          document.location.href = hapus.href;
        }
      });
  });
});