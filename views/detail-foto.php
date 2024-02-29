<?php
error_reporting(0);

$title = "My Album";
$side = "Album";
include '../controller/c_koneksi.php';
include_once "../controller/c_album.php";
include_once "../controller/c_foto.php";
// if($_SESSION['status']=="login"){
$tampil = new c_album();
$koneksi = new c_conn();
$conn = $koneksi->conn();
$poto = new c_foto();

date_default_timezone_set('Asia/Jakarta');
$waktu = date("Y-m-d H:i:s");

$foto = mysqli_query($conn, "SELECT * FROM foto WHERE foto_id = '" . $_GET['id'] . "' ");
$f = mysqli_fetch_object($foto);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <link href="../assets/img/faviconn.png" rel="icon">
    <title>WEB Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style1.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="index.php">WEB GALERI FOTO</a></h1>
            <ul>
                <li><a href="Dashboard.php">Dashboard</a></li>
                <li><a href="Album.php">Album</a></li>
                <li><a href="Profile.php">Profile</a></li>
                <li><a href="../routers/r_login.php?aksi=logout" onclick="return confirm ('Yakin ingin keluar') ">logout</a></li>
            </ul>
        </div>
    </header>

    <!-- product detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                    <img src="foto/<?php echo $f->foto ?>" width="100%" />
                </div>
                <div class="col-2">
                    <h3><?php echo $f->judul_foto ?><br />Album : <?php echo $f->album_id  ?></h3>
                    <h4>Nama User : <?php echo $f->username ?><br />
                        Upload Pada Tanggal : <?php echo $f->date  ?></h4>
                    <p>Deskripsi :<br />
                        <?php echo $f->deskripsi ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php

    include_once "template/footer.php";

    // }else{
    // echo "<script type='text/javascript'>
    // alert('Maaf Anda Belum Login');
    // window.location = '../login.php';
    // </script>";
    // }
    ?>