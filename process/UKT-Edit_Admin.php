<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include ('../connection/koneksi.php');

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id_kls'];
  $tingkatan = $_POST['tingkatan'];
  $nominal = $_POST['biaya_ukt'];
  
  // jalankan query UPDATE berdasarkan ID yang produknya kita edit
  $query  = "CALL UpdateGolUKT ($id, '$tingkatan', $nominal)";
  $result = mysqli_query($koneksi, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
  } else {
    

    echo 
      "<script>
        alert('Data berhasil diubah.');
        window.location='../content/adminData_Golongan-UKT.php';
      </script>";
  }

?>