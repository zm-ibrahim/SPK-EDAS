<?php
include 'templates/layout.php';
include '../connect.php';

$sql = "SELECT 
        a.id AS id_alternatif, 
        k.id AS id_kriteria,
        a.kode as ka,
        k.kode as kk,
        me.nilai as nilai
        FROM 
        alternatif a
        CROSS JOIN 
        kriteria k
        LEFT JOIN 
        matriks_evaluasi me ON a.id = me.id_alternatif AND k.id = me.id_kriteria
        WHERE 
        me.id IS NULL;";
$data = mysqli_query($connect, $sql);
?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="matrix-list.php" class="btn btn-icon">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <h1>Add Matrix Value</h1>
    </div>

    <div class="section-body">
        <!-- ALERT -->
        <?php include 'templates/flash.php' ?>
        <!-- ALERT ENDS -->
        <div class="row">
            <div class="col-12">
                <?php
                if (mysqli_num_rows($data) > 0) {
                    while ($row = mysqli_fetch_assoc($data)) {
                ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Matrix</h4>
                            </div>
                            <form action="../dashboard/process/m-add.php" method="post">
                                <input type="hidden" name="a-id" value="<?= $row['id_alternatif'] ?>">
                                <input type="hidden" name="k-id" value="<?= $row['id_kriteria'] ?>">
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Alternatif</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="ka" value="<?= $row['ka'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Kriteria</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="kk" value="<?= $row['kk'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nilai</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="nilai" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" name="submit">Update Value</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                <?php
                    }
                } else {
                    include 'templates/empty.php';
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php include 'templates/layout-bawah.php'; ?>