<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($konek, "DELETE FROM vanamei WHERE id=$id");

header("location:riwayat.php");
