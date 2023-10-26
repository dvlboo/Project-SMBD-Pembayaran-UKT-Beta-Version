<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include('../connection/koneksi.php');

	// membuat variabel untuk menampung data dari form
  $golongan   = $_POST['golongan'];
  $nominal     = $_POST['nominal'];
  
  // query procedure
  $query = "CALL insertGolUKT('$golongan', '$nominal')"; 
  $result = mysqli_query($koneksi, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
  } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo
    "<script>
      alert('Data berhasil ditambah.');
      window.location='../content/adminData_Golongan-UKT.php';
    </script>";
  }

?>