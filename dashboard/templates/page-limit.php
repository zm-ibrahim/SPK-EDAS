<?php
// Limiter Module
$batas = 8;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

// Page Number
$previous = $halaman - 1;
$next = $halaman + 1;

// Get actual rows of data

$data = mysqli_query($connect, $sql);
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

// limiting data
$query = "$sql limit $halaman_awal, $batas";
$datas = mysqli_query($connect, $query);
