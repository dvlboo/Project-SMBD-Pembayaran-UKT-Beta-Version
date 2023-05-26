<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include('../connection/koneksi.php');

	// membuat variabel untuk menampung data dari form
  $nama     = $_POST['nama_lengkap'];
  $nim      = $_POST['nim'];
  $username = $_POST['username'];
  $password = $_POST['password_'];
  $angkatan = $_POST['angkatan'];
  $golongan = $_POST['tingkatan'];
  $fakultas = $_POST['fakultas'];
  $prodi    = $_POST['prodi'];
  
  // query procedure
  $query = "CALL InsertMhs('$nama', '$nim', '$username', '$password', '$angkatan', '$golongan', '$fakultas', '$prodi')"; 
  $result = mysqli_query($koneksi, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
  } else {
    
    echo
    "<script>
      alert('Data berhasil ditambah.');
      window.location='../content/adminData_Mahasiswa.php';
    </script>";
  }

?>