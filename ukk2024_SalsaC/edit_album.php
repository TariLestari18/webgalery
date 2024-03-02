
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
    <h1 align="center" style="font-family:'Garamond'"><u> Edit Album </u></h1>
    <p align="center" style="font-family:'Garamond'">Login Sebagai <b><?=$_SESSION['namalengkap']?></b></p>
    <form action="update_album.php" method="post">
        <?php
        include "koneksi.php";
        $albumid=$_GET['albumid'];
        $sql=mysqli_query($conn, "select * from album where albumid='$albumid'");
        while($data=mysqli_fetch_array($sql)){
?>
<input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
<table>
    <tr>
        <td>Nama Album</td>
        <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
    </tr>
    <tr>
        <td>Deskripsi</td>
        <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
</tr>
<tr>
        <td></td>
        <td><input type="submit" class="btn btn-primary" name="Ubah"></td>
    </tr>
</table>
<?php
        }

        ?>
        </form>

</body>
</html>