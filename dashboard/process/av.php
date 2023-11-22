<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:" . baseURL . "login.php");
}

$del = "DELETE FROM solusi_rata_rata";
$delete = mysqli_query($connect, $del);

$sql_insert =
    "INSERT INTO solusi_rata_rata (nilai_rata_rata, id_kriteria)
    SELECT 
        SUM(me.nilai) / COUNT(DISTINCT a.kode) AS nilai_rata_rata,
        k.id AS id_kriteria
    FROM 
        alternatif a
    CROSS JOIN 
        kriteria k
    LEFT JOIN 
        matriks_evaluasi me ON a.id = me.id_alternatif AND k.id = me.id_kriteria
    GROUP BY 
        k.id;";

$insert = mysqli_query($connect, $sql_insert);

if ($insert) $_SESSION['flash_message'] = ['Average Solution updated successfully!', 'success'];
else $_SESSION['flash_message'] = ['Cant update alternative', 'danger'];
mysqli_close($connect);
header('Location: ../rerata.php');



// VIEW

// $sql_av = "SELECT 
// k.kode AS kode_kriteria,
// SUM(me.nilai) / COUNT(DISTINCT a.kode) AS nilai_rata_rata
// FROM 
// alternatif a
// CROSS JOIN 
// kriteria k
// LEFT JOIN 
// matriks_evaluasi me ON a.id = me.id_alternatif AND k.id = me.id_kriteria
// GROUP BY 
// k.kode";

// $av = mysqli_query($connect, $sql_av);