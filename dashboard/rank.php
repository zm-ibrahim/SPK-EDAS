<?php
include 'templates/layout.php';
include '../connect.php';

// Menampilkan hasil perhitungan dalam bentuk tabel
?>
<section class="section">
    <div class="section-header">
        <h1>Hasil Perhitungan Solusi Akhir</h1>
    </div>

    <!-- SP dan SN -->
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <!-- Tabel SP dan SN -->
                <div class="card">
                    <div class="card-header">
                        <h4>Nilai Rata-Rata Solusi (AS) berdasarkan Peringkat</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Kode Alternatif</th>
                                    <th>Nilai AS</th>
                                    <th>Peringkat</th>
                                </tr>
                                <?php
                                // Mengambil data SP, SN, dan nilai AS dari view_as
                                $sql_as = "SELECT kode_alternatif, nilai_AS, RANK() OVER (ORDER BY nilai_AS DESC) as peringkat FROM view_as";
                                $data_as = mysqli_query($connect, $sql_as);

                                // Menampilkan data SP, SN, dan nilai AS dalam tabel
                                while ($row_as = mysqli_fetch_assoc($data_as)) {
                                    echo "<tr>";
                                    echo "<td>{$row_as['kode_alternatif']}</td>";
                                    echo "<td>{$row_as['nilai_AS']}</td>";
                                    echo "<td>{$row_as['peringkat']}</td>";
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