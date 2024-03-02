<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
     <script src="https://kit.fontawesome.com/5b8a86cc74.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<i class="bi bi-arrow-left" onclick="history.back()"></i>
  <div class="container">
    <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="album.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="foto.php">Foto</a>
        </li>
      </ul>
    </div>
      <div class="navbar-nav me-auto">
      </div>
            <a href="logout.php" class="btn btn-outline-primary m-1">Logout</a>
      </div>
  </div>
</nav>   
    <h1 align="center" style="font-family:'Garamond'"><u> Album </u></h1>
    <p align="center" style="font-family:'Garamond'">Login Sebagai <b><?=$_SESSION['namalengkap']?></b></p>
    <h4 align="center" style="font-family:'Garamond'">Silahkan Isi</h4>

    <form action="tambah_album.php" method="post">
<table align="center">
    <tr>
        <td>Nama Album</td>
        <td><input type="text" name="namaalbum"></td>
        <tr><td>Deskripsi</td>
        <td><input type="text" name="deskripsi"></td>
    </tr>
        
<tr align="center">
    <td></td>
        <td><button type="submit" class="btn btn-primary" name="Tambah">Tambah</button></td>
    </tr>
       
    </tr>
</table>
</form>

<table class="table table-striped" border="1" cellpadding=2 cellspacing=0 align="center">
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Deskripsi</th>
    <th>Tanggal Dibuat</th>
    <th>aksi</th>
</tr>
<?php
include "koneksi.php";
$userid=$_SESSION['userid'];
$sql=mysqli_query($conn, "select * from album where userid='$userid'");
while($data=mysqli_fetch_array($sql)){
    ?>
    <tr>
        <td><?=$data['albumid']?></td>
        <td><?=$data['namaalbum']?></td>
        <td><?=$data['deskripsi']?></td>
        <td><?=$data['tanggaldibuat']?></td>
        <td>
            <a href="hapus_album.php?albumid=<?=$data['albumid']?>"><i class="fa-solid fa-trash"></i></a>
            <a href="edit_album.php?albumid=<?=$data['albumid']?>"><i class="fa-solid fa-pen-to-square"></i></a>
        </td>
    </tr>
    <?php
}
?>
</table>


<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 |salsa cantika</p>
</footer>


<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>