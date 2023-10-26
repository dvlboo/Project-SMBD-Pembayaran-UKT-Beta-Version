<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include('../connection/koneksi.php');
  
  $cek_user = 'admin';
  include ('../layout/header.php');
  include ('../layout/sidebar.php');

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['tingkatan'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $tingkatan = ($_GET["tingkatan"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM dataGolUKT WHERE tingkatan='$tingkatan'";
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
            window.location='../content/adminData_Golongan-UKT.php';
          </script>";
      }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo 
      "<script>alert('Masukkan data id.');
        window.location='../content/adminData_Golongan-UKT.php';
      </script>";
  }         
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Golongan UKT</title>
   
  </head>
<body>

  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>Edit Golongan UKT</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="../content/adminPage.php">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="../content/adminData_Golongan-UKT.php">Data Golongan UKT</a></div>
            <div class="breadcrumb-item text-primary">Edit Golongan UKT</div>
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
                      <i class="fas fa-money-check-alt"></i>
                    </div> 
                    <div class="wizard-step-label">Formulir Golongan UKT</div>
                  </div>
                </div>
              </div>
            </div>

            <form class="wizard-content mt-2" method="post" action="../process/UKT-Edit_Admin.php">
              <div class="wizard-pane">
              <input type="text" name="id_kls" value="<?php echo $data['id_kls']; ?>" hidden/>                
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Golongan</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="tingkatan" value="<?php echo $data['tingkatan']; ?>" required=""/>
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Nominal</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="biaya_ukt" value="<?php echo $data['biaya_ukt']; ?>" required=""/>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4"></div>
                  <div class="col-lg-4 col-md-6 text-right">
                    <button type="submit" class="btn btn-icon icon-right btn-primary">Ubah Golongan UKT<i class="fas fa-arrow-right"></i></button>
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