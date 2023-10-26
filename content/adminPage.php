<?php
  include('../connection/koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
  $cek_user = "admin";
  
  include ('../layout/header.php');
  include ('../layout/sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="main-content bg-primary">
    <section class="section">
      <div class="row">
        <div class="col-lg-12 col-md-5" >
          <div class="card card-statistic-2">
            <div class="card-stats">
              
            <div class="container horizontal-center">
              <br>
                <div class="row d-flex justify-content-center">
                    <i class="fa fa-user-circle fa-10x" aria-hidden="true"></i>
                </div>
                <br>
                <div class="row d-flex justify-content-center">
                  <h2>
                      Selamat Datang <?php echo $_SESSION['nama']; ?> | Admin
                  </h2>
                </div>
        <div style="font-size: 17px; text-align:left;">
            <br>
            Sistem Pembayaran UKT <strong>Beta Version</strong> merupakan projek akhir praktikum SMBD 4C yang dikerjakan oleh orang santai yaitu :
            <br>
            <table>
              <br>
              <tr>
                  <td>Nama Kelompok</td>
                  <td>:</td>
                  <td>1. Kukuh Cokro Wibowo</td>
                  <td>(210441100102)</td>
              </tr>
              <tr>
                  <td></td>
                  <td>:</td>
                  <td>2. Ingka Wulandari</td>
                  <td>(210441100060)</td>
              </tr>
              <tr>
                  <td>E-mail</td>
                  <td>:</td>
                  <td colspan="2"><a href="mailto:kukuhcokro411@gmail.com">uktkit4kit4@gmail.com</a>
              </tr>
            </table>

            <br>
        </div>
    </div>

            </div>
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