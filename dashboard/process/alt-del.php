<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:" . baseURL . "login.php");
}

$alt = $_GET['alt'];

$sql = "DELETE FROM alternatif WHERE id=$alt";
if (mysqli_query($connect, $sql)) $_SESSION['flash_message'] = ['Alternative deleted successfully!', 'success'];
else $_SESSION['flash_message'] = ['Cant delete alternative', 'danger'];
mysqli_close($connect);
header('Location: ../alternative-list.php');
