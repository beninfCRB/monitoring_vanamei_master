<?php
session_start();
include "koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Monitoring Budidaya</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/styles.css" rel="stylesheet" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/fonts.min.css" rel="stylesheet">
  <link href="assets/css/fonts.min.css" rel="stylesheet">
  <!-- DataTables -->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
  <link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>

  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav" id="navbarNavAltMarkup">
      <li class="nav-item  <?= $t == 'home' ? 'active' : ' ' ?>">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item  <?= $t == 'riwayat' ? 'active' : ' ' ?>">
        <a class="nav-link" href="riwayat.php">Riwayat</a>
      </li>
      <li class="nav-item  <?= $t == 'laporan' ? 'active' : ' ' ?>">
        <a class="nav-link" href="laporan.php">Laporan</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><?= $_SESSION['user'] ?></a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </nav>