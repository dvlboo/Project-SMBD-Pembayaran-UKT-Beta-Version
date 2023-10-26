<?php 
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($cek_user==""){
    header("location:../index.php?pesan=belummasuk");
  }

  if($cek_user=="admin"){

?>
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/ava.png" class="rounded-circle mr-1">
            Halo <b><?php echo $_SESSION['nama']; ?></b></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="../system/logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a>Pembayaran UKT</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a>UKT</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
              <a href="adminPage.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Data</li>
            <li><a class="nav-link" href="../content/adminData_Golongan-UKT.php"><i class="fas fa-database"></i> <span>Data Golongan UKT</span></a></li>
            <li><a class="nav-link" href="../content/adminData_Mahasiswa.php"><i class="fas fa-database"></i> <span>Data Mahasiswa</span></a></li>
            <li class="menu-header">Personal</li>
            <li><a class="nav-link" href="../content/adminUser_Admin.php"><i class="fas fa-user-edit"></i> <span>User Admin</span></a></li>
            <li><a class="nav-link" href="../content/adminUser_Mahasiswa.php"><i class="fas fa-user-graduate"></i> <span>User Mahasiswa</span></a></li>
            <li class="menu-header">Fitur</li>
            <!-- <li><a class="nav-link" href="../content/userPembayaran.php"><i class="fas fa-money-check-alt"></i> <span>TRANSAKSI PEMBAYARAN</span></a></li> -->
            <li><a class="nav-link" href="../content/adminData_Pembayaran.php"><i class="fas fa-book"></i> <span>Data Pembayaran</span></a></li>
          </ul>
        </aside>
      </div>
 
  <?php 
}
    else if($cek_user=="mahasiswa"){
  ?>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/ava.png" class="rounded-circle mr-1">
            Halo <b><?php echo $_SESSION['nama_lengkap']; ?></b> </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="../system/logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a>Pembayaran UKT</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a>UKT</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
              <a href="mhsPage.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Fitur</li>
            <li><a class="nav-link" href="../content/userPembayaran.php"><i class="fas fa-money-check-alt"></i> <span>Transaksi Pembayaran</span></a></li>
            <!-- <li><a class="nav-link" href="laporan.php"><i class="fas fa-book"></i> <span>LAPORAN</span></a></li> -->
          </ul>
          
        </aside>
      </div>
     <?php
   }
      else {
        header("location:index.php?pesan=gagal");
      }