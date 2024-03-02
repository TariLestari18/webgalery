<?php
include "koneksi.php";

$komentarid=$_GET['komentarid'];

$sql=mysqli_query($conn, "delete from komentarfoto where komentarid='$komentarid'");

header("komentar.php");
?>