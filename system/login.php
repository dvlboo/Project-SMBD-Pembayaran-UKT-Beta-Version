<?php

// mengaktifkan session pada php
session_start();

//menghubungkan dengan database
include '../connection/koneksi.php';

// menangkap data username dan password
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi user dengan username dan password yang sesuai

$login_admin = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");
$login_mhs = mysqli_query($koneksi,"select * from mahasiswa where username='$username' and password='$password'");


if(mysqli_num_rows($login_admin) > 0) {
    $data = mysqli_fetch_array($login_admin);
    $_SESSION["nama"] = $data["nama"];
    
    header("location:../content/adminPage.php");
    exit();

} elseif (mysqli_num_rows($login_mhs) > 0) {
    $data = mysqli_fetch_array($login_mhs);
    $_SESSION["nama_lengkap"] = $data["nama_lengkap"];
    $_SESSION["prodi"] = $data["prodi"];
    $_SESSION["nim"] = $data["nim"];


    header("location:../content/mhsPage.php");
    exit();

} else {
	header("location:../index.php?pesan=gagal");
}

?>