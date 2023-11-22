<?php include 'templates/layout.php'; ?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Hello</h4>
                        </div>
                        <div class="card-body">
                            <small><?= $username ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Listed Alternative</h4>
                        </div>
                        <div class="card-body">
                            #
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Listed Criteria</h4>
                        </div>
                        <div class="card-body">
                            #
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Highest Score</h4>
                        </div>
                        <div class="card-body">
                            #
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'templates/layout-bawah.php'; ?>