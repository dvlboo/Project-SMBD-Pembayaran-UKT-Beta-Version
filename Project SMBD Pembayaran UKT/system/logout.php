<?php
  include("../connection/koneksi.php");
  session_start();
  session_destroy();
  mysqli_close($koneksi);
  header('location:../index.php');
?>