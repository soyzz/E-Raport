<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Administrator</div>
                            <?php
                            include "../../config/koneksi.php";
                            $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user WHERE role = 'Admin'");
                            $jumlahAdministrator = mysqli_num_rows($queryAdmin)
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlahAdministrator ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Siswa</div>
                            <?php
                            include "../../config/koneksi.php";
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM siswa ");
                            $jumlahSiswa = mysqli_num_rows($querySiswa)
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlahSiswa ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Kelas</div>
                            <?php
                            include "../../config/koneksi.php";
                            $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user WHERE role = 'Admin'");
                            $jumlahKelas = mysqli_num_rows($queryAdmin)
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlahKelas ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Administrator</div>
                            <?php
                            include "../../config/koneksi.php";
                            $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user WHERE role = 'Admin'");
                            $jumlahAdministrator = mysqli_num_rows($queryAdmin)
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlahAdministrator ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Content Row -->

<div class="row">
    <div class="col-lg-12">
        <img src="../../assets/img/logo.png" style="display: block; margin-left: auto; margin-right: auto; margin-top: 35px;" height="220px" width="220px">
        <br>
        <h2 style="text-align: center;">Applikasi Raport Online</h2>
    </div>
</div>