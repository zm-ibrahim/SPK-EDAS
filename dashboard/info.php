<?php
include 'templates/layout.php';
include '../connect.php';

// Menampilkan hasil perhitungan dalam bentuk tabel
?>
<section class="section">
    <div class="section-header">
        <h1>Tentang Project Ini</h1>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Metode EDAS</h4>
                    </div>
                    <div class="card-body">
                        <p>Metode ini diperkenalkan oleh Keshavarz Ghorabaee pada tahun
                            2015 untuk menangani masalah MCDM. <br>
                            Metode EDAS menggunakan solusi rata-rata untuk penilaian
                            alternatif dengan cara menghitung jarak rata-rata positif (PDA)
                            dan jarak rata-rata negatif (NDA) <br>
                            Metode ini sangat berguna ketika kriteria yang bertentangan harus
                            dipertimbangkan (benefit dan cost), stabil ketika berbagai kriteria
                            bobot digunakan, dan konsisten dengan metode lain
                        </p>
                        <h6>Project ini sebagai tugas pemenuhan mata kuliah Sistem Pendukung Keputusan</h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Jurnal Rujukan</h4>
                    </div>
                    <div class="card-body">
                        <iframe src="https://jsi.politala.ac.id/index.php/JSI/article/view/606/181/3869" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-header">
        <h1>Anggota Kelompok</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                                <a href="https://github.com/finaorivia19" target="_blank" class="btn btn-primary mt-3">
                                    <i class="fab fa-github"></i>
                                    Github
                                </a>
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#">Fina Orivia</a>
                                </div>
                                <div class="author-box-job">NIM : 2141720256</div>
                                <div class="author-box-description">Kelas TI 3C <br>Nomor Absen : 08</div>
                                <div class="w-100 d-sm-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                                <a href="https://github.com/zm-ibrahim" target="_blank" class="btn btn-primary mt-3">
                                    <i class="fab fa-github"></i>
                                    Github
                                </a>
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#">Zaky Muhammad Ibrahim</a>
                                </div>
                                <div class="author-box-job">NIM : 2141720131</div>
                                <div class="author-box-description">Kelas TI 3C <br>Nomor Absen : 30</div>
                                <div class="w-100 d-sm-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'templates/layout-bawah.php'; ?>