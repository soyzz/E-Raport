<?php
session_start();
include "../config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");

$cek = mysqli_num_rows($data);

if ($cek > 0){
   $row = mysqli_fetch_assoc($data);

   if ($row['role']  == "Admin"){
       $_SESSION['id_user'] = $row['id_user'];
       $_SESSION['username'] = $username;
       $_SESSION['fullname'] = $row['fullname'];
       $_SESSION['status'] = "login";

       header("location: ../admin");

   } else if ($row['role'] == "Siswa"){
       $_SESSION['id_user'] = $row['id_user'];
       $_SESSION['username'] = $username;
       $_SESSION['fullname'] = $row['fullname'];

       header("location: ../user");
   } else {
       $_SESSION['user_tidak_terdaftar'] = "Maaf, User tidak terdaftar pada database !";

       header("location: ../masuk");
   }
} else {
    $_SESSION['gagal_login'] = "Maaf, Login Gagal !";

    header("location: ../masuk");
}
