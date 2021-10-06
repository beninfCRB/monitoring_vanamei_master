<?php
session_start();
include 'koneksi.php';
$usr = $_POST['username'];
$pwd = $_POST['password'];

$user = mysqli_query($konek, "SELECT * FROM user");
if (isset($usr) && isset($pwd)) {
    while ($u = mysqli_fetch_array($user)) {
        if ($u['user'] == $usr) {
            if ($u['password'] == md5($pwd)) {
                $_SESSION['user'] = $u['user'];
                $_SESSION['pwd'] = $u['password'];
                header('location:home.php');
            } else {
                header('location:index.php?error=2');
            }
        } else {
            header('location:index.php?error=1');
        }
    }
} elseif (isset($_SESSION['user']) != NULL && isset($_SESSION['pwd']) != NULL) {
    header('location:home.php');
} else {
    header('location:./');
}
