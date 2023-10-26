<?php
  include('../connection/koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  $no = 1;
  $viewMhs = mysqli_query($koneksi,'SELECT * FROM dataMhs;');

  $cek_user = 'admin';
  include ('../layout/header.php');
  include ('../layout/sidebar.php');
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Data Mahasiswa</title>
  </head>
<body>      
   <!-- Main Content -->
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>Data Mahasiswa</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="adminPage.php">Dashboard</a></div>
          <div class="breadcrumb-item text-primary">Data Mahasiswa</div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>List Mahasiswa</h4>
                <div class="card-header-form">
                  <form>
                    <div class="input-group-btn">
                      <a href="../system/adminAdd_Mhs.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>Angkatan</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th>Golongan</th>
                    <th>Nominal</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($data = mysqli_fetch_array($viewMhs)) { ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['nama_lengkap']; ?></td>
                        <td><?= $data['nim']; ?></td>
                        <td><?= $data['angkatan']; ?></td>
                        <td><?= $data['fakultas']; ?></td>
                        <td><?= $data['prodi']; ?></td>
                        <td><?= $data['tingkatan']; ?></td>
                        <td>Rp.<?= $data['biaya_ukt']; ?></td>
                        <td>
                        <a href="../system/adminEdit_Mhs.php?nim=<?= urlencode($data['nim']); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="../process/Mhs-Delete_Admin.php?nim=<?= urlencode($data['nim']); ?>" class="btn btn-danger" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php $no++; ?>
                    <?php } ?>
                  </tbody>
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