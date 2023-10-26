<?php
  include ('../connection/koneksi.php');
  
  $nim = $_GET["nim"];

  //jalankan PROCEDURE untuk menghapus data
  $query = "CALL DeleteMhs('$nim')";
  $hasil_query = mysqli_query($koneksi, $query);

  //periksa query, apakah ada kesalahan
  if(!$hasil_query) {
    die ("Gagal menghapus data: ".mysqli_errno($koneksi).
      " - ".mysqli_error($koneksi));
  } else {
    echo 
    "<script>
      alert('Data berhasil dihapus.');
        window.location='../content/adminData_Mahasiswa.php';
    </script>";
  }
?>