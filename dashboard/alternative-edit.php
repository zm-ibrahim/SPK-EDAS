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
        <h1>Update Existing Alternative</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Perbarui Alternatif</h4>
                    </div>
                    <form action="../dashboard/process/alt-edit.php" method="post">
                        <input type="hidden" name="a-id" value="<?= $data['id'] ?>">
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Alternatif</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="kode" value="<?= $data['kode'] ?>" required placeholder="contoh: A1">
                                    <small>Pastikan kode tidak sama dengan item lainnya</small>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Alternatif</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="name" value="<?= $data['nama'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple" name="desc"><?= $data['deskripsi'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" name="submit">Update Alternative</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'templates/layout-bawah.php'; ?>