<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:" . baseURL . "login.php");
}

// Check Permission
if (isset($_POST['submit'])) {
    $name = $_POST['nama'];
    $kode = $_POST['kode'];
    $jenis = $_POST['jenis'];
    $bobot = $_POST['bobot'];
    $desc = $_POST['desk'];
    $c_id = $_POST['c-id'];

    // Query
    $sql = "UPDATE kriteria 
    SET 
        nama = '$name',
        kode = '$kode',
        jenis = '$jenis',
        bobot = '$bobot',
        deskripsi = '$desc'
    WHERE  id = '$c_id'";

    if (mysqli_query($connect, $sql)) $_SESSION['flash_message'] = ['Criteria has been updated!', 'success'];
    else $_SESSION['flash_message'] = ['Cant update criteria!', 'danger'];

    mysqli_close($connect);
    header('Location: ../kriteria-list.php');
}
