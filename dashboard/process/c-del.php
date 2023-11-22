<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:" . baseURL . "login.php");
}

$kid = $_GET['kid'];

$sql = "DELETE FROM kriteria WHERE id=$kid";
if (mysqli_query($connect, $sql)) $_SESSION['flash_message'] = ['Criteria deleted successfully!', 'success'];
else $_SESSION['flash_message'] = ['Cant delete criteria', 'danger'];
mysqli_close($connect);
header('Location: ../kriteria-list.php');
