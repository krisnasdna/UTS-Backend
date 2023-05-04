<?php

include '../config.php';

$kode_kelas = $_POST ['kode_kelas'];

$sql = "INSERT INTO kelas (id,kode_kelas) 
VALUES ('','$kode_kelas')";
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