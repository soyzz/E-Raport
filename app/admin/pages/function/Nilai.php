<?php

/**
 * Applikasi raport online
 */
session_start();
include "../../../../config/koneksi.php";

if ($_GET['aksi'] == "tambah") {

    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    // Cek nama
    $sql1 = mysqli_query($koneksi, "SELECT * FROM nilaisiswa WHERE kelas = '$kelas' AND jurusan = '$jurusan' AND nama = '$_POST[namaSiswa]'");
    $cek = mysqli_num_rows($sql1);

    if ($cek > 0) {
        $_SESSION['gagal'] = "Nilai gagal ditambahkan, nama siswa sudah terinput pada database !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {

        $nama = $_POST['namaSiswa'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        // Mapel
        $agama = $_POST['agama'];
        $basisdata = $_POST['basisData'];
        $bahasaindonesia = $_POST['bahasaIndonesia'];
        $bahasainggris = $_POST['bahasaInggris'];
        $matematika = $_POST['matematika'];
        $pbo = $_POST['pbo'];
        $pkn = $_POST['pkn'];
        $pwb = $_POST['pwb'];
        $penjas = $_POST['penjas'];
        $sql = "INSERT INTO nilaisiswa(nama,kelas,jurusan,agama,pkn,bahasa_indonesia,bahasa_inggris,matematika,basis_data,pbo,pwb)
            VALUES('" . $nama . "','" . $kelas . "','" . $jurusan . "','" . $agama . "','" . $pkn . "','" . $bahasaindonesia . "','" . $bahasainggris . "','" . $matematika . "','" . $basisdata . "','" . $pbo . "','" . $pwb . "','" . $penjas .)";

        $sql .= mysqli_query($koneksi, $sql);

        if ($sql) {
            $_SESSION['berhasil'] = "Nilai berhasil ditambahkan !";
            header("location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['gagal'] = "Nilai gagal ditambahkan !";
            header("location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}
