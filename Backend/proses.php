<?php

include 'config.php';

$nim = $_POST ['nim'];
$nama_mhs = $_POST ['nama'];
$kd_jurusan = $_POST ['jurusan'];
$gender = $_POST ['gender'];
$alamat = $_POST ['alamat'];
$no_hp = $_POST ['no_hp'];
$email = $_POST ['email'];

$sql = "INSERT INTO mahasiswa (nim,nama_mhs,kd_jurusan,gender,alamat,no_hp,email) 
VALUES ('$nim','$nama_mhs','$kd_jurusan','$gender','$alamat','$no_hp','$email' )";

    if(mysqli_query($conn, $sql)){
        $message = "Data Berhasil Dimasukan";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'index.php';</script>";
    }
    else{
        $message = "Data Berhasil Dimasukan";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'index.php';</script>";
    }
    mysqli_close($conn);
?>