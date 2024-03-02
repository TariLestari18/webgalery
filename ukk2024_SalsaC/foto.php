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
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <i class="bi bi-arrow-left" ></i>
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

    <h1 align="center" style="font-family:'Garamond'"><u> Foto </u></h1>
    <p align="center" style="font-family:'Garamond'">Selamat Datang <b><?=$_SESSION['namalengkap']?></b></p>
    <h4 align="center" style="font-family:'Garamond'">Silahkan Isi</h4>

    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
<table align="center">
    <tr>
        <td>Judul</td>
        <td><input type="text" name="judulfoto"></td>
    </tr>
    <tr>
        <td>Deskripsi</td>
        <td><input type="text" name="deskripsifoto"></td>
</tr>
<tr>
        <td>Lokasi File</td>
        <td><input type="file" name="lokasifile"></td>
</tr>
<tr>
        <td>Album</td>
        <td>
            <select name="albumid">
            <?php
include "koneksi.php";
$userid=$_SESSION['userid'];
$sql=mysqli_query($conn, "select * from album where userid='$userid'");
while ($data=mysqli_fetch_array($sql)) {
            ?>
            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
            <?php
}
?>
            </select>
        </td>
</tr>
<tr>
        <td></td>
        <td><button type="submit" class="btn btn-primary" name="Tambah">Tambah</button></td>
    </tr>
</table>
</form>

<table class="table table-striped" border="1" width="90%" align="center" cellpadding=5 cellspacing=0>
<tr>
    <th>ID</th>
    <th>Judul</th>
    <th>Deskripsi</th>
    <th>Tanggal Unggah</th>
    <th>Lokasi File</th>
    <th>Album</th>
    <th>aksi</th>
</tr>
<?php
include "koneksi.php";
$userid=$_SESSION['userid'];
$sql=mysqli_query($conn, "select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
while($data=mysqli_fetch_array($sql)){
    ?>
    <tr>
        <td><?=$data['albumid']?></td>
        <td><?=$data['judulfoto']?></td>
        <td><?=$data['deskripsifoto']?></td>
        <td><?=$data['tanggalunggah']?></td>
        <td>
<img src="gambar/<?=$data['lokasifile']?>" width="200px">
        </td>
        <td><?=$data['namaalbum']?></td>
        <td>
            <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>"><i class="fa-solid fa-trash"></i></a>
            <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>"><i class="fa-solid fa-pen-to-square"></i></a>
        </td>
    </tr>
    <?php
}
?>
</table>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 | salsa cantika</p>
</footer>


<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>