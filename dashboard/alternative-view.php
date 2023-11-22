<?php include 'templates/layout.php'; ?>
<?php
include '../connect.php';
$alt = $_GET['alt'];
$sql = "SELECT * FROM alternatif WHERE id=$alt";
$data = mysqli_query($connect, $sql);
$data = $data->fetch_assoc();
?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="alternative-list.php" class="btn btn-icon">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <h1>View Alternative</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tampilkan Alternatif</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Alternatif</label>
                            <div class="col-sm-12 col-md-7">
                                <p><?= $data['kode'] ?></p>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Alternatif</label>
                            <div class="col-sm-12 col-md-7">
                                <p><?= $data['nama'] ?></p>
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