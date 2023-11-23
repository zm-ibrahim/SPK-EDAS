<?php
$sql1 = "SELECT COUNT(kode) FROM alternatif";
$alts = mysqli_query($connect, $sql1);
$alts = $alts->fetch_assoc();
var_dump($alts);

$sql2 = "SELECT COUNT(kode) FROM kriteria";
$kris = mysqli_query($connect, $sql2);
$kri = $kri->fetch_assoc();
var_dump($kri);
