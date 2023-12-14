<?php
include 'templates/header.php';
include '../connect.php';

$av = "SELECT k.kode, s.nilai_rata_rata FROM solusi_rata_rata s JOIN kriteria k ON k.id = s.id_kriteria";
$av = (mysqli_query($connect, $av));
?>

<script>
    function cetakHalaman() {
        window.print(); // Fungsi ini akan memunculkan dialog pencetakan
        tutupHalaman();
    }

    function tutupHalaman() {
        window.onafterprint = function() {
            window.close(); // Fungsi ini akan menutup jendela setelah mencetak
        }
    }

    cetakHalaman();
</script>

<body>
    <div id="app">
        <div class="">

            <!-- Main Content -->
            <main class="main-content">

                <section class="section">
                    <div class="section-header">
                        <h1>Hasil Perhitungan Nilai Rata-rata dan Solusi</h1>

                    </div>
                    <div class="section-body">
                        <!-- ALERT -->
                        <?php include 'templates/flash.php' ?>
                        <!-- ALERT ENDS -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Nilai Rata-rata Kriteria (AV)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Kode Kriteria</th>
                                                    <th>Nilai AV</th>
                                                </tr>
                                                <?php
                                                while ($row_matriks = mysqli_fetch_assoc($av)) {
                                                    echo "<tr>";
                                                    echo "<td>{$row_matriks['kode']}</td>";
                                                    echo "<td>" . number_format($row_matriks['nilai_rata_rata'], 2) . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- PDA Matriks -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Nilai Rata-Rata Jarak Positif (PDA)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Alt</th>
                                                    <?php

                                                    include '../dashboard/process/pda.php';
                                                    // Menampilkan header dengan kode kriteria
                                                    if (count($kode_kriteria_unik) > 0) {
                                                        foreach ($kode_kriteria_unik as $kode_kriteria) {
                                                            echo "<th>$kode_kriteria</th>";
                                                        }
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                                // Menampilkan data matriks PDA
                                                while ($row_alternatif = mysqli_fetch_assoc($data_alternatif)) {
                                                    $kode_alternatif = $row_alternatif['kode_alternatif'];
                                                    echo "<tr>";
                                                    echo "<td>$kode_alternatif</td>";
                                                    foreach ($kode_kriteria_unik as $kode_kriteria) {
                                                        $nilai_pda = isset($matriks_data_pda[$kode_alternatif][$kode_kriteria]) ? $matriks_data_pda[$kode_alternatif][$kode_kriteria] : '';
                                                        echo "<td>$nilai_pda</td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tabel Matriks NDA -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Nilai Rata-Rata Jarak Negatif (NDA)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Alt</th>
                                                    <?php
                                                    include '../dashboard/process/nda.php';
                                                    // Menampilkan header dengan kode kriteria
                                                    if (count($kode_kriteria_unik) > 0) {
                                                        foreach ($kode_kriteria_unik as $kode_kriteria) {
                                                            echo "<th>$kode_kriteria</th>";
                                                        }
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                                // Menampilkan data matriks NDA
                                                while ($row_alternatif = mysqli_fetch_assoc($data_alternatif)) {
                                                    $kode_alternatif = $row_alternatif['kode_alternatif'];
                                                    echo "<tr>";
                                                    echo "<td>$kode_alternatif</td>";
                                                    foreach ($kode_kriteria_unik as $kode_kriteria) {
                                                        $nilai_nda = isset($matriks_data_nda[$kode_alternatif][$kode_kriteria]) ? $matriks_data_nda[$kode_alternatif][$kode_kriteria] : '';
                                                        echo "<td>$nilai_nda</td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <!-- Tabel SP dan SN -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Nilai Solusi Positif (SP) dan Negatif (SN) untuk Setiap Alternatif</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Kode Alternatif</th>
                                                <th>Nilai SP</th>
                                                <th>Nilai SN</th>
                                            </tr>
                                            <?php
                                            // Mengambil data SP dan SN dari view sp_sn
                                            $sql_sp_sn = "SELECT kode_alternatif, sp, sn FROM sp_sn";
                                            $data_sp_sn = mysqli_query($connect, $sql_sp_sn);

                                            // Menampilkan data SP dan SN dalam tabel
                                            while ($row_sp_sn = mysqli_fetch_assoc($data_sp_sn)) {
                                                echo "<tr>";
                                                echo "<td>{$row_sp_sn['kode_alternatif']}</td>";
                                                echo "<td>{$row_sp_sn['sp']}</td>";
                                                echo "<td>{$row_sp_sn['sn']}</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Tabel NSP dan NSN -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Nilai Normalisasi Solusi Positif (NSP) dan Negatif (NSN) untuk Setiap Alternatif</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Kode Alternatif</th>
                                                <th>Nilai NSP</th>
                                                <th>Nilai NSN</th>
                                            </tr>
                                            <?php
                                            // Mengambil data SP dan SN dari view sp_sn
                                            $sql_sp_sn = "SELECT id_alternatif, kode_alternatif, nsp, nsn FROM nsp_nsn order by id_alternatif";
                                            $data_sp_sn = mysqli_query($connect, $sql_sp_sn);

                                            // Menampilkan data SP dan SN dalam tabel
                                            while ($row_sp_sn = mysqli_fetch_assoc($data_sp_sn)) {
                                                echo "<tr>";
                                                echo "<td>{$row_sp_sn['kode_alternatif']}</td>";
                                                echo "<td>{$row_sp_sn['nsp']}</td>";
                                                echo "<td>{$row_sp_sn['nsn']}</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        </section>

        <?php include 'templates/layout-bawah.php'; ?>