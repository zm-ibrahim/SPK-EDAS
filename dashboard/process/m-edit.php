<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:" . baseURL . "login.php");
}

if (isset($_POST['submit'])) {
    $k_a = $_POST['k-a'];
    $k_k = $_POST['k-k'];
    $nilai = $_POST['nilai'];

    // Query
    $sql = "UPDATE matriks_evaluasi me
    JOIN alternatif a ON a.id = me.id_alternatif
    JOIN kriteria k ON k.id = me.id_kriteria
    SET me.nilai = $nilai
    WHERE a.kode = '$k_a'
        AND k.kode = '$k_k'
    ";

    try {
        mysqli_query($connect, $sql);
        $_SESSION['flash_message'] = ['Value has been updated!', 'success'];
    } catch (\Throwable $th) {
        if (mysqli_errno($connect) == 1062) {
            $_SESSION['flash_message'] = ['Cant update value!', 'danger'];
        } else $_SESSION['flash_message'] = [mysqli_error($connect), 'danger'];
    }

    mysqli_close($connect);
    header('Location: ../matrix-list.php');
}
