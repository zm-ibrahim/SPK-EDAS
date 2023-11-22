<?php
include 'templates/layout.php';
include '../connect.php'

?>
<section class="section">
    <div class="section-header">
        <h1>List of Alternative</h1>
        <div class="section-header-button">
            <a href="alternative-add.php" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Alternative</h4>
                    </div>
                    <div class="card-body">
                        <!-- ALERT -->
                        <?php include 'templates/flash.php' ?>
                        <!-- ALERT ENDS -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Code</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                </tr>
                                <!-- Pagination Module -->
                                <?php
                                // Get actual rows of data
                                $sql = "SELECT * FROM alternatif";

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
                                                    <a href="alternative-view.php?alt=<?= $data['id'] ?>">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="alternative-edit.php?alt=<?= $data['id'] ?>">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="../dashboard/process/alt-del?alt=<?= $data['id'] ?>" class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                                <?= $data['deskripsi'] ?>
                                            </td>
                                        </tr>
                                <?php
                                        $i++;
                                    }
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