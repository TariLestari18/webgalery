<?php
include "koneksi.php";

$komentarid=$_POST['komentarid'];
$isikomentar=$_POST['namaalbum'];

$sql=mysqli_query($conn, "update komentarfoto set isikomentar='$isikomentar' where komentarid='$komentarid'");
header("location:komentar.php");
?>