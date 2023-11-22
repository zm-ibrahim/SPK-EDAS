<?php
include 'templates/layout.php';
include '../connect.php';

// Ambil data kriteria
$sql_kriteria = "SELECT * FROM kriteria";
$data_kriteria = mysqli_query($connect, $sql_kriteria);

// Ambil data alternatif
$sql_alternatif = "SELECT * FROM alternatif";
$data_alternatif = mysqli_query($connect, $sql_alternatif);

?>
<section class="section">
    <div class="section-header">
        <h1>Matrix Value</h1>
        <div class="section-header-button">
            <a href="matrix-add.php" class="btn btn-primary">Check Unlisted Matrix</a>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Nilai Matriks Evaluasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Alt</th>
                                    <?php
                                    // Menampilkan header dengan kode kriteria
                                    if (mysqli_num_rows($data_kriteria) > 0) {
                                        while ($row_kriteria = mysqli_fetch_assoc($data_kriteria)) {
                                            echo "<th>" . $row_kriteria['kode'] . "</th>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                                // Mengambil data dari matriks_evaluasi
                                $sql_matriks = "SELECT a.kode AS kode_alternatif, k.kode AS kode_kriteria, me.nilai 
                                                FROM alternatif a
                                                CROSS JOIN kriteria k
                                                LEFT JOIN matriks_evaluasi me ON a.id = me.id_alternatif AND k.id = me.id_kriteria";
                                $data_matriks = mysqli_query($connect, $sql_matriks);

                                // Menyiapkan array untuk menyimpan data alternatif dan nilai
                                $alternatif_data = array();

                                // Menyiapkan array untuk menyimpan data matriks evaluasi
                                $matriks_data = array();

                                // Memproses data matriks evaluasi
                                if (mysqli_num_rows($data_matriks) > 0) {
                                    while ($row_matriks = mysqli_fetch_assoc($data_matriks)) {
                                        $alternatif_data[$row_matriks['kode_alternatif']][] = $row_matriks['nilai'];
                                    }

                                    // Menampilkan data dalam bentuk tabel
                                    foreach ($alternatif_data as $alternatif => $nilai) {
                                        echo "<tr>";
                                        echo "<td>$alternatif</td>";
                                        foreach ($nilai as $nilai_kriteria) {
                                            echo "<td>$nilai_kriteria</td>";
                                        }
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='" . (mysqli_num_rows($data_kriteria) + 1) . "'>No Data Found</td></tr>";
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