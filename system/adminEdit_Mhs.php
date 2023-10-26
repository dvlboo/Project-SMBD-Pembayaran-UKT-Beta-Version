<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include('../connection/koneksi.php');
  
  $cek_user = 'admin';
  include ('../layout/header.php');
  include ('../layout/sidebar.php');

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['nim'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $nim = ($_GET["nim"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
      if (!count($data)) {
        echo
          "<script>alert('Data tidak ditemukan pada database');
            window.location='../content/adminData_Mahasiswa.php';
          </script>";
      }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo 
      "<script>alert('Masukkan data id.');
        window.location='../content/adminData_Mahasiswa.php';
      </script>";
  }         
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Data Mahasiswa</title>
   
  </head>
<body>

  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>Edit Data Mahasiswa</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="../content/adminPage.php">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="../content/adminData_Mahasiswa.php">Data Mahasiswa</a></div>
            <div class="breadcrumb-item text-primary">Edit Mahasiswa</div>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card"></div>
          <div class="card-body bg-primary">
            <div class="row mt-4">
              <div class="col-12 col-lg-8 offset-lg-2">
                <div class="wizard-steps">
                  <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                      <i class="fas fa-user-graduate"></i>
                    </div> 
                    <div class="wizard-step-label">Formulir Mahasiswa</div>
                  </div>
                </div>
              </div>
            </div>

            <form class="wizard-content mt-2" method="post" action="../process/Mhs-Edit_Admin.php">
              <div class="wizard-pane">
                <input type="text" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa']; ?>" hidden/>                
                  
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Nama Lengkap</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" required=""/>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NIM</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nim" value="<?php echo $data['nim']; ?>" required=""/>
                  </div>
                </div>
                  
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Angkatan</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="angkatan" value="<?php echo $data['angkatan']; ?>" required=""/>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Fakultas</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="fakultas" value="<?php echo $data['fakultas']; ?>" required=""/>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Prodi</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="prodi" value="<?php echo $data['prodi']; ?>" required=""/>
                  </div>
                </div>
                
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Golongan</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="id_kls" value="<?php echo $data['id_kls']; ?>" required=""/>
                  </div>
                </div>
                  
                <div class="form-group row">
                  <div class="col-md-4"></div>
                  <div class="col-lg-4 col-md-6 text-right">
                    <button type="submit" class="btn btn-icon icon-right btn-primary">Ubah Mahasiswa<i class="fas fa-arrow-right"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php 
    include ('../layout/footer.php');
  ?>
</body>