<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:" . baseURL . "login.php");
}

if (isset($_POST['submit'])) {
    $name = $_POST['nama'];
    $kode = $_POST['kode'];
    $jenis = $_POST['jenis'];
    $bobot = $_POST['bobot'];
    $desc = $_POST['desk'];

    // Query
    $sql = "INSERT INTO kriteria (kode, nama, jenis, bobot, deskripsi) VALUES ('$kode', '$name', '$jenis','$bobot','$desc')";
    if (mysqli_query($connect, $sql)) $_SESSION['flash_message'] = ['Criteria has been added!', 'success'];
    else $_SESSION['flash_message'] = ['Cant add Criteria!', 'danger'];

    mysqli_close($connect);
    header('Location: ../kriteria-list.php');
}
