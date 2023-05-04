<?php

include '../config.php';

$kode_dosen = $_GET ['kode_dosen'];
$sql = "DELETE FROM dosen where kode_dosen = '$kode_dosen'";
    if(mysqli_query($conn, $sql)){
        $message = "Data Berhasil dihapus";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'index.php';</script>";
    }
    else{
        $message = "Data gagal Dihapus";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'index.php';</script>";
    }
?>