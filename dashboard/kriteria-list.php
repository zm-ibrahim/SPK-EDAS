<?php include 'templates/layout.php'; ?>
<section class="section">
    <div class="section-header">
        <h1>List of Criteria</h1>
        <div class="section-header-button">
            <a href="kriteria-add.php" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="section-body">
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
                                <tr>
                                    <td>C1</td>
                                    <td>Kriteria
                                        <div class="table-links">
                                            <a href="#">View</a>
                                            <div class="bullet"></div>
                                            <a href="#">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="#" class="text-danger">Trash</a>
                                        </div>
                                    </td>
                                    <td>
                                        Sebuah Deskripsi
                                    </td>
                                    <td>
                                        30
                                    </td>
                                    <td>
                                        <div class="badge badge-primary">Benefit</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="float-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'templates/layout-bawah.php'; ?>