<?php
// Query untuk mendapatkan jumlah kriteria
$sqlTotalKriteria = "SELECT COUNT(*) as total_kriteria FROM kriteria";
$resultTotalKriteria = mysqli_query($connect, $sqlTotalKriteria);
$rowTotalKriteria = mysqli_fetch_assoc($resultTotalKriteria);
$totalKriteria = $rowTotalKriteria['total_kriteria'];

// Query untuk mendapatkan jumlah alternatif
$sqlTotalAlternatif = "SELECT COUNT(*) as total_alternatif FROM alternatif";
$resultTotalAlternatif = mysqli_query($connect, $sqlTotalAlternatif);
$rowTotalAlternatif = mysqli_fetch_assoc($resultTotalAlternatif);
$totalAlternatif = $rowTotalAlternatif['total_alternatif'];

// Query untuk mendapatkan skor dari nilai_AS dengan peringkat pertama
$sqlNilaiASPertama = "SELECT kode_alternatif, nilai_AS FROM view_as ORDER BY nilai_AS DESC LIMIT 1";
$resultNilaiASPertama = mysqli_query($connect, $sqlNilaiASPertama);
$rowNilaiASPertama = mysqli_fetch_assoc($resultNilaiASPertama);
$kodeAlternatifPertama = $rowNilaiASPertama['kode_alternatif'];
$nilaiASPertama = $rowNilaiASPertama['nilai_AS'];
