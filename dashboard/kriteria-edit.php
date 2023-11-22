<?php include 'templates/layout.php'; ?>
<?php
include '../connect.php';
$kid = $_GET['kid'];
$sql = "SELECT * FROM kriteria WHERE id=$kid";
$data = mysqli_query($connect, $sql);
$data = $data->fetch_assoc();
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var bobotValue = "<?php echo $data['jenis']; ?>";
        document.getElementById("jenis").value = bobotValue;
    });
</script>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="kriteria-list.php" class="btn btn-icon">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <h1>Add New Criteria</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambahkan Kriteria Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="../dashboard/process/c-edit.php" method="post">
                            <input type="hidden" name="c-id" value="<?= $data['id'] ?>">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Kriteria</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="kode" value="<?= $data['kode'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kriteria</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="jenis" id="jenis">
                                        <option value="Benefit">Benefit</option>
                                        <option value="Cost">Cost</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bobot</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control" name="bobot" value="<?= $data['bobot'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple" name="desk"><?= $data['deskripsi'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" name="submit">Update Criteria</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'templates/layout-bawah.php'; ?>