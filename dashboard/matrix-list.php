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
$sql_matriks = "SELECT a.kode AS kode_alternatif, k.kode AS kode_kriteria, me.nilai 
                FROM alternatif a
                CROSS JOIN kriteria k
                LEFT JOIN matriks_evaluasi me ON a.id = me.id_alternatif AND k.id = me.id_kriteria";
$data_matriks = mysqli_query($connect, $sql_matriks);

// Menyiapkan array untuk menyimpan data matriks evaluasi
$matriks_data = array();

// Memproses data matriks evaluasi
if (mysqli_num_rows($data_matriks) > 0) {
    while ($row_matriks = mysqli_fetch_assoc($data_matriks)) {
        $matriks_data[] = $row_matriks;
    }
}

// Mendapatkan kode alternatif dan kode kriteria yang unik
$kode_alternatif_unik = array_unique(array_column($matriks_data, 'kode_alternatif'));
$kode_kriteria_unik = array_unique(array_column($matriks_data, 'kode_kriteria'));

?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Menetapkan event listener pada dropdown
        document.getElementById('kode_alternatif').addEventListener('change', updateNilai);
        document.getElementById('kode_kriteria').addEventListener('change', updateNilai);

        // Fungsi untuk memperbarui nilai
        function updateNilai() {
            // Mendapatkan nilai terpilih dari dropdown
            var kodeAlternatif = document.getElementById('kode_alternatif').value;
            var kodeKriteria = document.getElementById('kode_kriteria').value;

            // Mencari nilai sesuai dengan kode alternatif dan kode kriteria
            var nilai = findNilai(kodeAlternatif, kodeKriteria);

            // Menetapkan nilai pada input nilai
            document.getElementById('nilai').value = nilai;
        }

        function findNilai(kodeAlternatif, kodeKriteria) {
            // Mencari nilai sesuai dengan kode alternatif dan kode kriteria
            var nilai = null;
            <?php
            foreach ($matriks_data as $matriks) {
                echo "if (\"{$matriks['kode_alternatif']}\" === kodeAlternatif && \"{$matriks['kode_kriteria']}\" === kodeKriteria) {";
                echo "nilai = \"{$matriks['nilai']}\";";
                echo "}";
            }
            ?>
            return nilai;
        }
    });
</script>

<section class="section">
    <div class="section-header">
        <h1>Matrix Value</h1>
        <div class="section-header-button">
            <a href="../dashboard/matrix-add.php">
                <button class="btn btn-primary">Check Unlisted Value</button>
            </a>
        </div>
        <div class="section-header-button">
            <button class="btn btn-warning" id="toggleFormBtn">Toggle Update</button>
        </div>
    </div>
    <div class="section-body">
        <!-- ALERT -->
        <?php include 'templates/flash.php' ?>
        <!-- ALERT ENDS -->
        <div class="row mt-4">
            <div class="col-12">
                <!-- Form Edit Matrix -->
                <div class="card" id="editForm" style="display: none;">
                    <div class="card-header">
                        <h4>Update Matrix</h4>
                        <p class="fa fa-exclamation-circle card-header-action"> Perhatikan halaman Unlisted Value. Pastikan Anda sudah memberi nilai sebelum melakukan update</p>
                    </div>
                    <form action="../dashboard/process/m-edit.php" method="post">
                        <div class="card-body">
                            <!-- Dropdown Kode Alternatif -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alternatif</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="k-a" id="kode_alternatif">
                                        <?php
                                        foreach ($kode_alternatif_unik as $kode_alternatif) {
                                            echo "<option value=\"$kode_alternatif\">$kode_alternatif</option>";
                                        }
                                        ?>
                                    </select>
                                    <small>Jika nilai tidak langsung ditampilkan pada preview, pilih nilai lain, kemudian pilih kembali target anda</small>
                                </div>
                            </div>

                            <!-- Dropdown Kode Kriteria -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kriteria</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="k-k" id="kode_kriteria">
                                        <?php
                                        foreach ($kode_kriteria_unik as $kode_kriteria) {
                                            echo "<option value=\"$kode_kriteria\">$kode_kriteria</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Input Nilai -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nilai</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nilai" id="nilai" required>
                                </div>
                            </div>

                            <!-- Button Submit -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" name="submit">Update Value</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- Tabel Matriks Evaluasi -->
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
                                // Menampilkan data matriks evaluasi
                                foreach ($kode_alternatif_unik as $kode_alternatif) {
                                    echo "<tr>";
                                    echo "<td>$kode_alternatif</td>";
                                    foreach ($kode_kriteria_unik as $kode_kriteria) {
                                        $nilai = null;
                                        // Mencari nilai sesuai dengan kode alternatif dan kode kriteria
                                        foreach ($matriks_data as $matriks) {
                                            if ($matriks['kode_alternatif'] == $kode_alternatif && $matriks['kode_kriteria'] == $kode_kriteria) {
                                                $nilai = $matriks['nilai'];
                                                break;
                                            }
                                        }
                                        echo "<td>$nilai</td>";
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

<script>
    // Toggling visibility of the edit form
    document.getElementById('toggleFormBtn').addEventListener('click', function() {
        var editForm = document.getElementById('editForm');
        editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'block' : 'none';
    });
</script>

<?php include 'templates/layout-bawah.php'; ?>