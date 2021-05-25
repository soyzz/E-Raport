<?php

/**
 * Applikasi raport online
 */
session_start();
include "../../../../config/koneksi.php";

if ($_GET['aksi'] == "tambah") {
    // fungsi tambah siswa ke table siswa
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];
    $role = "Siswa";
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO siswa(nis,nama,kelas,jurusan,alamat)
                        VALUES('" . $nis . "','" . $nama . "','" . $kelas . "','" . $jurusan . "','" . $alamat . "')";
    $sql .= mysqli_query($koneksi, $sql);

    // fungsi tambah siswa ke table user
    $sql2 = "INSERT INTO user(fullname,username,password,role)
                        VALUES('" . $nama . "', '" . $username . "','" . $password . "','" . $role . "')";
    $sql2 .= mysqli_query($koneksi, $sql2);

    if ($sql) {
        $_SESSION['berhasil'] = "Data siswa berhasil ditambahkan !";
        header("location: ../../siswa");
    } else {
        $_SESSION['gagal'] = "Data siswa gagal ditambahkan !";
        header("location: ../../siswa");
    }
} elseif ($_GET['aksi'] == "edit") {
    // fungsi edit siswa
    $id_siswa = $_POST['id_siswa'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE siswa SET nis = '$nis', nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', alamat = '$alamat'";

    $query .= "WHERE id_siswa = $id_siswa";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Data siswa berhasil diedit !";
        header("location: ../../siswa");
    } else {
        $_SESSION['gagal'] = "Data siswa gagal diedit !";
        header("location: ../../siswa");
    }
} elseif ($_GET['aksi'] == "hapus") {
    $id_siswa = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = '$id_siswa'");

    if ($sql) {
        $_SESSION['berhasil'] = "Data siswa berhasil di hapus !";
        header("location: ../../siswa");
    } else {
        $_SESSION['gagal'] = "Data siswa gagal di hapus !";
        header("location: ../../siswa");
    }
}
