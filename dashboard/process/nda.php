<?php
// Ambil data kriteria
$sql_kriteria = "SELECT * FROM kriteria";
$data_kriteria = mysqli_query($connect, $sql_kriteria);

// Ambil data unik untuk kode alternatif
$sql_alternatif = "SELECT DISTINCT kode_alternatif FROM pda_nda";
$data_alternatif = mysqli_query($connect, $sql_alternatif);

// Mendapatkan data kriteria unik
$kode_kriteria_unik = array();
while ($row_kriteria = mysqli_fetch_assoc($data_kriteria)) {
    $kode_kriteria_unik[] = $row_kriteria['kode'];
}

// Menyiapkan array untuk menyimpan data matriks NDA
$matriks_data_nda = array();

// Mengambil data matriks NDA dari view pda_nda
$sql_matriks_nda = "SELECT kode_alternatif, kode_kriteria, nda FROM pda_nda WHERE nda IS NOT NULL";
$data_matriks_nda = mysqli_query($connect, $sql_matriks_nda);

// Menyimpan data matriks NDA dalam array
while ($row_matriks_nda = mysqli_fetch_assoc($data_matriks_nda)) {
    $matriks_data_nda[$row_matriks_nda['kode_alternatif']][$row_matriks_nda['kode_kriteria']] = $row_matriks_nda['nda'];
}
