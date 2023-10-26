<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include ('../connection/koneksi.php');


  // membuat variabel untuk menampung data dari form

  $namaLengkap = $_POST['nama_lengkap'];
  $viewMhs = mysqli_query($koneksi,"SELECT * FROM dataMhs WHERE nama_lengkap = '$namaLengkap'");
  $data = mysqli_fetch_array($viewMhs);
  
  $dataIDMhs = $data['id_mahasiswa'];
  $tgl = $_POST['tgl_bayar'];
  $nominal = $_POST['nominal_bayar'];
  $biayaUkt = $data['biaya_ukt'];

  if ($nominal == $biayaUkt) {
      
      // jalankan query
      $query  = "CALL InsertPembayaran ($dataIDMhs, '$tgl', $nominal)";
      $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
      if(!$result){
          die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
      } else {
        
        echo 
        "<script>
          alert('Data Berhasil Ditambah.');
          window.location='../content/userPembayaran.php';
        </script>";
      }
  } else {

    echo
    "<script>
      alert('Nominal UKTmu Salah!!!!');
      window.location='../content/userPembayaran.php';
    </script>";
  }
  


?>