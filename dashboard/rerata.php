<?php
include 'templates/layout.php';
include '../connect.php';

// Ambil data matriks evaluasi
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
            </div>
        </div>
    </div>
</section>
<?php include 'templates/layout-bawah.php'; ?>