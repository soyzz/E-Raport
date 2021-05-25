<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
<div class="form-group m-b-2 text-right">
    <button type="button" onclick="tambahSiswa()" class="btn btn-info">Tambah Siswa</button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
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
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include "../../config/koneksi.php";
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM siswa");
                while($data = mysqli_fetch_array($tampil)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nis']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['alamat']; ?></td>
                        <td><?= $data['jurusan']; ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-success"> <i class="fas fa-pen"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
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
<div class="modal fade" id="modalTambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Siswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action ="pages/function/tambah_siswa.php" method="POST">
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
                <textarea class="form-control"></textarea>
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