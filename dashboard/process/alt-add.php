<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:" . baseURL . "login.php");
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $kode = $_POST['kode'];
    $desc = $_POST['desc'];

    // Query
    $sql = "INSERT INTO alternatif (kode, nama, deskripsi) VALUES ('$kode', '$name', '$desc')";

    try {
        mysqli_query($connect, $sql);
        $_SESSION['flash_message'] = ['Alternative has been added!', 'success'];
    } catch (\Throwable $th) {
        if (mysqli_errno($connect) == 1062) {
            $_SESSION['flash_message'] = ['Alternative Code already used !', 'danger'];
        } else $_SESSION['flash_message'] = [mysqli_error($connect), 'danger'];
    }

    mysqli_close($connect);
    header('Location: ../alternative-list.php');
}
