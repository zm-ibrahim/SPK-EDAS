<?php include 'templates/layout.php'; ?>
<?php
include '../connect.php';
$kid = $_GET['kid'];
$sql = "SELECT * FROM kriteria WHERE id=$kid";
$data = mysqli_query($connect, $sql);
$data = $data->fetch_assoc();
?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="kriteria-list.php" class="btn btn-icon">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <h1>View Criteria</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tampilkan Kriteria</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Kriteria</label>
                            <div class="col-sm-12 col-md-7">
                                <p><?= $data['kode'] ?></p>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kriteria</label>
                            <div class="col-sm-12 col-md-7">
                                <p><?= $data['nama'] ?></p>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                            <div class="col-sm-12 col-md-7">
                                <p><?= $data['jenis'] ?></p>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bobot</label>
                            <div class="col-sm-12 col-md-7">
                                <p><?= $data['bobot'] ?></p>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                            <div class="col-sm-12 col-md-7">
                                <?= $data['deskripsi'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'templates/layout-bawah.php'; ?>