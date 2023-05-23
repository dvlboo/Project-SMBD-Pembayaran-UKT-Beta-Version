<?php
  include('../connection/koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Data Golongan UKT</title>
  </head>
<body>

<?php
  $cek_user = 'admin';
  include ('../layout/header.php');
  include ('../layout/sidebar.php');
?>
      
   <!-- Main Content -->
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>Data Golongan UKT</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="admin_page.php">Dashboard</a></div>
          <div class="breadcrumb-item text-primary">Data Golongan UKT</div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>List Golongan UKT</h4>
                <div class="card-header-form">
                  <form>
                    <div class="input-group-btn">
                      <a href="tambah_spp.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                    </div>
                  </form>
                </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Golongan</th>
                    <th>Nominal Pembayaran</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tr>
                    <?php
                      $no = 1; 
                    ?>
                  <tr>  
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['tahun']; ?></td>
                    <td><?php echo substr($row['nominal'], 0, 20); ?></td>   
                    <td>
                    <a href="edit_spp.php?id=<?php echo $row['id_spp']; ?>"class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="proses_hapusspp.php?id=<?php echo $row['id_spp']; ?>" class="btn btn-danger" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                    <?php
                      $no++; //untuk nomor urut terus bertambah 1
                      // }
                    ?>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php
    include ('../layout/footer.php');
  ?>
</body>
</html>