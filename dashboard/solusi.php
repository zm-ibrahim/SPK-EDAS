<?php
include 'templates/layout.php';
include '../connect.php';

// Menampilkan hasil perhitungan dalam bentuk tabel
?>
<section class="section">
    <div class="section-header">
        <h1>Hasil Perhitungan Solusi</h1>
    </div>

    <!-- SP dan SN -->
    <div class="section-body">
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