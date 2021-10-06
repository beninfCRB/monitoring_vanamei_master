<?php
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$ph = $_GET['ph'];
$temp = $_GET['temp'];
$ppm = $_GET['ppm'];
$time = date('h:i:s');
$date = date('d/m/Y');
$print = date('mY');
$query = "INSERT INTO vanamei VALUES(NULL,'$ph','$ppm','$temp','$time','$date','$print')";
mysqli_query($konek, "ALTER TABLE vanamei AUTO_INCREMENT=1");
mysqli_query($konek, $query);
