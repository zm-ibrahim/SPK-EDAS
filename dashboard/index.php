<?php
include 'templates/layout.php';
include '../connect.php';
include '../dashboard/process/dashboard.php';
?>

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
                            <?= $totalAlternatif ?>
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
                            <?= $totalKriteria ?>
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
                            <small class="small"><?= number_format($nilaiASPertama, 2)  ?> (<?= $kodeAlternatifPertama ?>)</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistics</h4>
                        <div class="card-header-action">
                            <!-- <div class="btn-group">
                    <a href="#" class="btn btn-primary">Week</a>
                    <a href="#" class="btn">Month</a>
                </div> -->
        </div>
    </div>
    <div class="card-body">
        <!-- <canvas id="myChart" height="600" style="display: block; width: 496px; height: 300px;" width="992" class="chartjs-render-monitor"></canvas> -->
    </div>
    </div>
    </div> -->

    <!-- <script>
        // Ambil data nilai AS dari database
        <?php
        // $sqlChartData = "SELECT kode_alternatif, nilai_AS FROM view_as ORDER BY nilai_AS DESC";
        // $dataChartData = mysqli_query($connect, $sqlChartData);
        // $labels = [];
        // $values = [];

        // while ($rowChartData = mysqli_fetch_assoc($dataChartData)) {
        //     $labels[] = $rowChartData['kode_alternatif'];
        //     $values[] = $rowChartData['nilai_AS'];
        // }
        ?>

        // Inisialisasi grafik menggunakan Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Nilai AS',
                    data: <?= json_encode($values) ?>,
                    // backgroundColor: 'rgba(75, 192, 192, 0.2)', // warna background grafik
                    // borderColor: 'rgba(75, 192, 192, 1)', // warna border grafik
                    // borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> -->

    </div>
    </div>
</section>

<?php include 'templates/layout-bawah.php'; ?>