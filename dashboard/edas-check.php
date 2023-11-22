<?php
include 'templates/layout.php';
include '../connect.php';

// Ambil data kriteria
$sql_kriteria = "SELECT * FROM kriteria";
$data_kriteria = mysqli_query($connect, $sql_kriteria);

// Ambil data alternatif
$sql_alternatif = "SELECT * FROM alternatif";
$data_alternatif = mysqli_query($connect, $sql_alternatif);

// Ambil data matriks evaluasi
$sql_matriks = "SELECT * FROM matriks_evaluasi";
$data_matriks = mysqli_query($connect, $sql_matriks);

// Menghitung nilai AV untuk setiap kriteria
$av_values = array();
while ($row_kriteria = mysqli_fetch_assoc($data_kriteria)) {
    $kriteria_id = $row_kriteria['id'];
    $sum = 0;
    $count = 0;

    // Menghitung jumlah nilai untuk kriteria
    while ($row_matriks = mysqli_fetch_assoc($data_matriks)) {
        if ($row_matriks['id_kriteria'] == $kriteria_id) {
            $sum += $row_matriks['nilai'];
            $count++;
        }
    }

    // Menghitung nilai AV
    $av_values[$kriteria_id] = ($count > 0) ? $sum / $count : 0;
    mysqli_data_seek($data_matriks, 0); // Mengembalikan pointer data matriks ke awal
}

// Menghitung skor EDAS untuk setiap alternatif
$edas_scores = array();
while ($row_alternatif = mysqli_fetch_assoc($data_alternatif)) {
    $alternatif_id = $row_alternatif['id'];
    $edas_score = 0;

    // Menghitung skor EDAS
    mysqli_data_seek($data_matriks, 0); // Mengembalikan pointer data matriks ke awal
    while ($row_matriks = mysqli_fetch_assoc($data_matriks)) {
        $kriteria_id = $row_matriks['id_kriteria'];
        $nilai_matriks = $row_matriks['nilai'];
        $av_kriteria = $av_values[$kriteria_id];

        // Normalisasi Matriks Evaluasi
        $normalized_value = ($av_kriteria != 0) ? $nilai_matriks / $av_kriteria : 0;

        // Menghitung skor EDAS
        $edas_score += abs($normalized_value - 1);
    }

    // Menyimpan skor EDAS untuk alternatif
    $edas_scores[$alternatif_id] = $edas_score;
}

// Menampilkan hasil perhitungan dalam bentuk tabel
?>
<section class="section">
    <div class="section-header">
        <h1>Hasil Perhitungan EDAS</h1>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Nilai Solusi Rata-Rata (AV) untuk Setiap Kriteria:</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Kriteria</th>
                                    <th>Nilai AV</th>
                                </tr>
                                <?php
                                foreach ($av_values as $kriteria_id => $av) {
                                    echo "<tr>";
                                    echo "<td>Kriteria $kriteria_id</td>";
                                    echo "<td>$av</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Skor EDAS untuk Setiap Alternatif:</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Alternatif</th>
                                    <th>Skor EDAS</th>
                                </tr>
                                <?php
                                foreach ($edas_scores as $alternatif_id => $edas_score) {
                                    echo "<tr>";
                                    echo "<td>Alternatif $alternatif_id</td>";
                                    echo "<td>$edas_score</td>";
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