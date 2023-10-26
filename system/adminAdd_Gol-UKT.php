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
    <title>Penambahan Data Golongan UKT</title>
</head>
<body>
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>Tambah Golongan UKT</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="../content/adminPage.php">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="../content/adminData_Golongan-UKT.php">Data Golongan UKT</a></div>
          <div class="breadcrumb-item text-primary">Tambah Golongan UKT</div>
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

            <form class="wizard-content mt-2" method="post" action="../process/UKT-Add_Admin.php"> <!-- pindah activity page -->
              <div class="wizard-pane">
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Golongan</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="golongan" class="form-control">
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Nominal Pembayaran</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nominal" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-4"></div>
                  <div class="col-lg-4 col-md-6 text-right">
                    <button type="submit" class="btn-icon btn-icon icon-right btn-primary">Tambah Golongan UKT    <i class="fas fa-arrow-right"></i></button>
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