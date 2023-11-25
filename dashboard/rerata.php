<?php
include 'templates/layout.php';
include '../connect.php';


$av = "SELECT k.kode, s.nilai_rata_rata FROM solusi_rata_rata s JOIN kriteria k ON k.id = s.id_kriteria";
$av = (mysqli_query($connect, $av));

// Menampilkan hasil perhitungan dalam bentuk tabel
?>
<section class="section">
    <div class="section-header">
        <h1>Hasil Perhitungan Nilai Rata-rata</h1>
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
                        <div class="card-header-button">
                            <a href="../dashboard/process/av.php" class="btn btn-primary">Update AV</a>
                        </div>
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
</section>

<?php include 'templates/layout-bawah.php'; ?>