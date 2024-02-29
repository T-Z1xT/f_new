<?php
include_once "../controller/c_login.php";
$id = $_SESSION['user_id'];
$nama = $_SESSION['fullname'];
$alamat = $_SESSION['alamat'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$jk = $_SESSION['JK'];
if($_SESSION['status']=="login"){
$koneksi = new c_conn();
$conn = $koneksi->conn();
include_once "validasi.php";

// include_once "validasi.php";

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
           <li><a href="../routers/r_login.php?aksi=logout" onclick="return confirm('Yakin ingin keluar')">logout</a></li>
        </ul>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $username ?> di Website Galeri Foto</h4>
            </div>
        </div>
    </div>


    
    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM album ORDER BY album_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
                    <a href="galeri.php?kat=<?php echo $k['album_id'] ?>">
                        <div class="col-5">
                            <img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;" />
                        <p><?php echo $k['nama_album'] ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                     <p>Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <!-- new product -->
    <div class="container">
       <h3>Foto Terbaru</h3>
       <div class="box">
          <?php
              $foto = mysqli_query($conn, "SELECT * FROM foto ORDER BY foto_id DESC LIMIT 8");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
          <a href="detail-image.php?id=<?php echo $p['foto_id'] ?>">
          <div class="col-4">
              <img src="foto/<?php echo $p['image'] ?>" height="150px" />
              <p class="nama"><?php echo substr($p['judul_foto'], 0, 30)  ?></p>
              <p class="admin">Nama User : <?php echo $p['username'] ?></p>
              <p class="nama"><?php echo $p['date']  ?></p>
          </div>
          </a>
          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
       </div>
    </div>
    
    <!-- footer -->
     <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
</body>
</html>

<?php
}else{
	echo "<script type='text/javascript'>
	alert('Maaf Anda Belum Login');
	window.location = '../login.php';
</script>";
}
?>