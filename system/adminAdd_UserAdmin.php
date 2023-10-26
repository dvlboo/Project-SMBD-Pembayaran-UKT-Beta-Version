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
    <title>Penambahan Data User Admin</title>
</head>
<body>
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>Tambah User Admin</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="../content/adminPage.php">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="../content/adminUser_Admin.php">User Admin</a></div>
          <div class="breadcrumb-item text-primary">Tambah User Admin</div>
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
                      <i class="fas fa-user-edit"></i>
                    </div>
                    <div class="wizard-step-label">Formulir User Admin</div>
                  </div>
                </div>
              </div>
            </div>

            <form class="wizard-content mt-2" method="post" action="../process/Admin-Add_Admin.php"> <!-- pindah activity page -->
              <div class="wizard-pane">
                
              <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Nama Admin Baru</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nama" class="form-control">
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

                <div class="form-group row">
                  <div class="col-md-4"></div>
                  <div class="col-lg-4 col-md-6 text-right">
                    <button type="submit" class="btn-icon btn-icon icon-right btn-primary">Tambah User Admin    <i class="fas fa-arrow-right"></i></button>
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