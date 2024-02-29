<?php
    error_reporting(0);

    $title = "My Album";
    $side = "Album";
    include_once "template/header.php";
    include '../controller/c_koneksi.php';
    include_once "../controller/c_album.php";
    include_once "../controller/c_foto.php";
    if($_SESSION['status']=="login"){
    $tampil = new c_album();
    $koneksi = new c_conn();
    $conn = $koneksi->conn();
    $poto = new c_foto();

    date_default_timezone_set('Asia/Jakarta');
    $waktu = date("Y-m-d H:i:s");
	
	$album = mysqli_query($conn, "SELECT * FROM album WHERE album_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($album);
?>

<body>
    <!-- product detail -->
    <div class="section">
        <div class="container">
             <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                   <img src="foto/<?php echo $p->album ?>" width="80%" /> 
                </div>
                <div class="col-2">
                   <h4>Nama Album : <?php echo $p->album_name ?><br />
                   Upload Pada Tanggal : <?php echo $p->date  ?></h4>
                </div>
            </div>
        </div>
    </div>

<?php

include_once "template/footer.php";

}else{
echo "<script type='text/javascript'>
alert('Maaf Anda Belum Login');
window.location = '../login.php';
</script>";
}
?>