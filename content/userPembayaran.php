<?php 
// include('../connection/koneksi.php');

  $cek_user = 'mahasiswa';
  include ('../layout/header.php');
  include ('../layout/sidebar.php');

  $namaLengkap = $_SESSION['nama_lengkap'];
  $viewMhs = mysqli_query($koneksi,"SELECT * FROM dataMhs WHERE nama_lengkap = '$namaLengkap'");
  $data = mysqli_fetch_array($viewMhs);

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
        <h1>TRANSAKSI PEMBAYARAN UKT</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="../content/mhsPage.php">Dashboard</a></div>
          <!-- <div class="breadcrumb-item"><a href="../content/adminData_Golongan-UKT.php">Data Golongan UKT</a></div> -->
          <div class="breadcrumb-item text-primary">Transaksi Pembayaran</div>
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
                    <div class="wizard-step-label">Formulir Pembayaran UKT Mahasiswa</div>
                  </div>
                </div>
              </div>
            </div>

            <form class="wizard-content mt-2" method="post" action="../process/PembayaranUKT.php" onsubmit="uploadBuktiPembayaran()"> <!-- pindah activity page -->
              <div class="wizard-pane">
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Nama Mahasiswa</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nama_lengkap" value="<?php echo $namaLengkap; ?>" class="form-control" readonly>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NIM</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nim" value="<?php echo $_SESSION['nim']; ?>" class="form-control" readonly>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Golongan UKT</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="tingkatan" value="<?php echo $data['tingkatan']; ?>" class="form-control" readonly>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Nominal Pembayaran</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nominal" value="Rp. <?php echo $data['biaya_ukt']; ?>" class="form-control" readonly>
                  </div>
                </div>


                <br><br>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Input Biaya UKTmu</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nominal_bayar" class="form-control" placeholder="Rp. " required>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Tanggal Pembayaran</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="date" name="tgl_bayar" class="form-control" aria-label="tanggal" aria-describedby="basic-addon1" required>
                  </div>

                </div>


                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">Bukti Pembayaran</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="file" name="gambar_bukti" class="form-control" accept="image/png" required>
                  </div>
                </div>

                <div>
                  <img id="preview_bukti" src="#" alt="Preview" style="display: none; max-width: 300px; margin-top: 10px;">
                </div>

                <div class="form-group row">
                  <div class="col-md-4"></div>
                  <div class="col-lg-4 col-md-6 text-right">
                    <button type="submit" class="btn-icon btn-icon icon-right btn-success"> BAYAR </button>
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

<script>
        function uploadBuktiPembayaran() {
            event.preventDefault(); // Menghentikan tindakan default formulir

            var inputGambar = document.getElementById("gambar_bukti");
            var file = inputGambar.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var imagePreview = document.getElementById("preview_bukti");
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block";
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
</html>      