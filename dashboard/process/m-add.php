<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:" . baseURL . "login.php");
}

if (isset($_POST['submit'])) {
    $a_id = $_POST['a-id'];
    $k_id = $_POST['k-id'];
    $nilai = $_POST['nilai'];

    // Query
    $sql = "INSERT INTO matriks_evaluasi (id_alternatif, id_kriteria, nilai) VALUES ('$a_id', '$k_id', '$nilai')";
    if (mysqli_query($connect, $sql)) $_SESSION['flash_message'] = ['Value has been added!', 'success'];
    else $_SESSION['flash_message'] = ['Cant add value!', 'danger'];

    mysqli_close($connect);
    header('Location: ../matrix-add.php');
}
