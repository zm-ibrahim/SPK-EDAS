<?php
include 'templates/layout.php';
include '../connect.php';
?>
<section class="section">
    <div class="section-header">
        <h1>List of Criteria</h1>
        <div class="section-header-button">
            <a href="kriteria-add.php" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="section-body">
        <!-- ALERT -->
        <?php include 'templates/flash.php' ?>
        <!-- ALERT ENDS -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Criteria</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Code</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Bobot</th>
                                    <th>Category</th>
                                </tr>
                                <!-- Pagination Module -->
                                <?php
                                $sql = "SELECT * FROM kriteria";

                                include '../dashboard/templates/page-limit.php';

                                if (mysqli_num_rows($datas) > 0) {
                                    $i = $halaman_awal + 1;
                                    foreach ($datas as $data) {
                                ?>
                                        <!-- Ends Pagination Module -->
                                        <tr>
                                            <td><?= $data['kode'] ?></td>
                                            <td><?= $data['nama'] ?>
                                                <div class="table-links">
                                                    <a href="kriteria-view.php?kid=<?= $data['id'] ?>">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="kriteria-edit.php?kid=<?= $data['id'] ?>">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="../dashboard/process/c-del.php?kid=<?= $data['id'] ?>" class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                                <?= $data['deskripsi'] ?>
                                            </td>
                                            <td>
                                                <?= $data['bobot'] ?>
                                            </td>
                                            <td>
                                                <div class="badge <?php echo ($data['jenis'] === 'Cost') ? 'badge-warning' : 'badge-primary'; ?>">
                                                    <?php echo $data['jenis']; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                } else {
                                    ?>
                                    <div class="empty-state">
                                        <i class="fas fa-question"></i>
                                        No Data Found
                                    </div>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <?php include '../dashboard/templates/page.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'templates/layout-bawah.php'; ?>