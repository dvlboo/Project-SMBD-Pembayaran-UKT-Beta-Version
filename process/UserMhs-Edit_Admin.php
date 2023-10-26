<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include ('../connection/koneksi.php');

	// membuat variabel untuk menampung data dari form
  $id       = $_POST['id_mahasiswa'];
  $nama     = $_POST['nama_lengkap'];
  $username = $_POST['username'];
  $pass_    = $_POST['password_'];
  
  // jalankan query UPDATE berdasarkan ID yang produknya diedit
  $query  = "CALL UpdateUserMhs ($id, '$nama', '$username', '$pass_')";
  $result = mysqli_query($koneksi, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
  } else {
    
    echo 
      "<script>
        alert('Data berhasil diubah.');
        window.location='../content/adminUser_Mahasiswa.php';
      </script>";
  }

?>