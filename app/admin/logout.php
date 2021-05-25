<?php 
session_start();

unset($_SESSION['id_user']);
unset($_SESSION['ussername']);
unset($_SESSION['fullname']);

$_SESSION['berhasil'] = "Anda telah berhasil keluar !";
header("location: ../../masuk");