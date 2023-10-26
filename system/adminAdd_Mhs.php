<?php 
// include('../connection/koneksi.php');

$cek_user = 'admin';
  include ('../layout/header.php');
  include ('../layout/sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penambahan Data Mahasiswa</title>
</head>
<body>
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>Tambah Data Mahasiswa</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="../content/adminData_Mahasiswa.php">Data Mahasiswa</a></div>
          <div class="breadcrumb-item text-primary">Tambah Mahasiswa</div>
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

            <form class="wizard-content mt-2" method="post" action="../process/Mhs-Add_Admin.php"> <!-- pindah activity page -->
              <div class="wizard-pane">
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Nama Lengkap</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nama_lengkap" class="form-control">
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NIM</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nim" class="form-control">
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Username</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="username" class="form-control">
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Password</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="password_" class="form-control">
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Angkatan</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="angkatan" class="form-control">
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Fakultas</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="fakultas" class="form-control">
                  </div>
                </div>
                
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Prodi</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="prodi" class="form-control">
                  </div>
                </div>
                
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Golongan</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="tingkatan" class="form-control">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-4"></div>
                  <div class="col-lg-4 col-md-6 text-right">
                    <button type="submit" class="btn-icon btn-icon icon-right btn-primary">Tambah Mahasiswa <i class="fas fa-arrow-right"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
<?php
include ('../layout/footer.php');
?>
</html>      