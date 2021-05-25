<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Siswa</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Siswa</h6>
        </div>
        <div class="card-body">
            <form action="pages/views/v_data_siswa.php" method="POST">
                <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="Kelas">
                        <option selected disabled>-- Pilih Kelas --</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" name="Jurusan">
                        <option selected disabled>-- Pilih Jurusan --</option>
                        <option value="APK">Administrasi Perkantoran</option>
                        <option value="BNK">Perbankan</option>
                        <option value="FMS">Farmasi</option>
                        <option value="RPL">Rekayasa Perangkat Lunak</option>
                        <option value="TKJ">Teknik Komputer dan Jaringan</option>
                        <option value="TKR">Teknik Kendaraan Ringan</option>
                        <option value="TSM">Teknik Sepeda Motor</option>
                        <option value="TBG">Tata Boga</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tampilkan Data Siswa</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<!-- -->
<script src="../../assets/js/sweetalert.min.js"></script>
<!-- -->
<script>
    <?php
    if (isset($_SESSION['gagal_login']) && $_SESSION['gagal_login'] <> '') {
        echo "swal({
			icon: 'error',
			title: 'Peringatan',
			text: '$_SESSION[gagal_login]'
		})";
    }
    $_SESSION['gagal_login'] = '';
    ?>
</script>
<script>
    <?php
    if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] <> '') {
        echo "swal({
			icon: 'success',
			title: 'Berhasil',
			text: '$_SESSION[berhasil]'
		})";
    }
    $_SESSION['berhasil'] = '';
    ?>
</script>