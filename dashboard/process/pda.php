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

// Menyiapkan array untuk menyimpan data matriks PDA
$matriks_data_pda = array();

// Mengambil data matriks PDA dari view pda_nda
$sql_matriks_pda = "SELECT kode_alternatif, kode_kriteria, pda FROM pda_nda WHERE pda IS NOT NULL";
$data_matriks_pda = mysqli_query($connect, $sql_matriks_pda);

// Menyimpan data matriks PDA dalam array
while ($row_matriks_pda = mysqli_fetch_assoc($data_matriks_pda)) {
    $matriks_data_pda[$row_matriks_pda['kode_alternatif']][$row_matriks_pda['kode_kriteria']] = $row_matriks_pda['pda'];
}
