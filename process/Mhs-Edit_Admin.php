<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include ('../connection/koneksi.php');

	// membuat variabel untuk menampung data dari form
  $id       = $_POST['id_mahasiswa'];
  $nama     = $_POST['nama_lengkap'];
  $nim      = $_POST['nim'];
  $golongan = $_POST['id_kls'];
  $fakultas = $_POST['fakultas'];
  $prodi    = $_POST['prodi'];
  $angkatan = $_POST['angkatan'];
  
  // jalankan query UPDATE berdasarkan ID yang produknya kita edit
  $query  = "CALL UpdateMhs ($id, '$nama', $nim, $angkatan, '$fakultas', '$prodi', $golongan)";
  $result = mysqli_query($koneksi, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
  } else {
    

    echo 
      "<script>
        alert('Data berhasil diubah.');
        window.location='../content/adminData_Mahasiswa.php';
      </script>";
  }

?>