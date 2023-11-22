<?php include 'templates/layout.php'; ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="alternative-list.php" class="btn btn-icon">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <h1>Add New Alternative</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambahkan Alternatif Baru</h4>
                    </div>
                    <form action="../dashboard/process/alt-add.php" method="post">
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Alternatif</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="kode">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Alternatif</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple" name="desc"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" name="submit">Create Alternative</button>
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