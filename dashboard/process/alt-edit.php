<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:" . baseURL . "login.php");
}

// Check Permission
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $kode = $_POST['kode'];
    $desc = $_POST['desc'];
    $a_id = $_POST['a-id'];

    // Query
    $sql = "UPDATE alternatif 
    SET 
        nama = '$name',
        kode = '$kode',
        deskripsi = '$desc'
    WHERE  id = '$a_id'";

    if (mysqli_query($connect, $sql)) $_SESSION['flash_message'] = ['Alternative has been updated!', 'success'];
    else $_SESSION['flash_message'] = ['Cant update alternative!', 'danger'];

    mysqli_close($connect);
    header('Location: ../alternative-list.php');
}
