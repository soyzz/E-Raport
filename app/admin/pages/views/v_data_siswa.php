<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Raport App</title>

    <!-- Custom fonts for this template-->
    <link href="../../../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">e-Raport</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../../siswa">
                    <i class="fas fa-users fa-chart-area"></i>
                    <span>Siswa</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "../../pages/navbar.php"; ?>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Siswa - <?= $_POST['Kelas']; ?></h1>
                    <div class="form-group m-b-2 text-right">
                        <button type="button" onclick="tambahSiswa()" class="btn btn-info">Tambah Siswa</button>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Siswa - <?= $_POST['Kelas']; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "../../../../config/koneksi.php";
                                        $no = 1;
                                        $kelas = $_POST['Kelas'];
                                        $jurusan = $_POST['Jurusan'];
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM siswa WHERE kelas = '$kelas' AND jurusan = '$jurusan'");
                                        while ($data = mysqli_fetch_array($tampil)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['nis']; ?></td>
                                                <td><?= $data['nama']; ?></td>
                                                <td><?= $data['alamat']; ?></td>
                                                <td><?= $data['kelas']; ?></td>
                                                <td><?= $data['jurusan']; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-success" data-target="#modalEditSiswa<?= $data['id_siswa']; ?>" data-toggle="modal"> <i class="fas fa-pen"></i></a>
                                                    <a href="../../pages/function/Siswa.php?aksi=hapus&id=<?= $data['id_siswa']; ?>" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </a>
                                                </td>
                                            </tr>
                                            <!-- Modal edit siswa -->
                                            <div class="modal fade" id="modalEditSiswa<?= $data['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Siswa</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="../../pages/function/Siswa.php?aksi=edit" method="POST">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_siswa" value="<?= $data['id_siswa']; ?>">
                                                                <div class="form-group">
                                                                    <label>NIS</label>
                                                                    <input class="form-control" type="number" name="nis" value="<?= $data['nis']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama Siswa</label>
                                                                    <input class="form-control" type="text" name="nama" value="<?= $data['nama']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Username</label>
                                                                    <input class="form-control" name="username" placeholder="Masukan Username">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input class="form-control" name="password" placeholder="Masukan Password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Kelas</label>
                                                                    <select class="form-control" name="kelas">
                                                                        <option selected value="<?= $data['kelas']; ?>">-- Pilih Kelas --</option>
                                                                        <option value="X">X</option>
                                                                        <option value="XI">XI</option>
                                                                        <option value="XII">XII</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Jurusan</label>
                                                                    <select class="form-control" name="jurusan">
                                                                        <option selected value=<?= $data['jurusan']; ?>>-- Pilih Jurusan --</option>
                                                                        <option value="APK">APK</option>
                                                                        <option value="BNK">BNK</option>
                                                                        <option value="FMS">FMS</option>
                                                                        <option value="RPL">RPL</option>
                                                                        <option value="TKJ">TKJ</option>
                                                                        <option value="TKR">TKR</option>
                                                                        <option value="TSM">TSM</option>
                                                                        <option value="TBG">TBG</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Alamat</label>
                                                                    <textarea class="form-control" name="alamat"><?= $data['alamat']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.-->
                                    </tbody>
                                <?php
                                        }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <div class="modal fade" id="modalTambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Siswa</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="../../pages/function/Siswa.php?aksi=tambah" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input class="form-control" type="number" name="nis" placeholder="Masukan NIS">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Siswa">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="username" placeholder="Masukan Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="password" placeholder="Masukan Passowrd">
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" name="kelas">
                                            <option selected disabled>-- Pilih Kelas --</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <select class="form-control" name="jurusan">
                                            <option selected disabled>-- Pilih Jurusan --</option>
                                            <option value="APK">APK</option>
                                            <option value="BNK">BNK</option>
                                            <option value="FMS">FMS</option>
                                            <option value="RPL">RPL</option>
                                            <option value="TKJ">TKJ</option>
                                            <option value="TKR">TKR</option>
                                            <option value="TSM">TSM</option>
                                            <option value="TBG">TBG</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    function tambahSiswa() {
                        $('#modalTambahSiswa').modal('show');
                    }
                </script>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "../../pages/footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="keluar">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../../assets/js/demo/datatables-demo.js"></script>

</body>

</html>