<?php

include 'config.php';

$kode_matkul = $_GET ['kode_matkul'];
$sql = "DELETE FROM matkul where kode_matkul = '$kode_matkul'";
    if(mysqli_query($conn, $sql)){
        $message = "Data Berhasil dihapus";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'matkul.php';</script>";
    }
    else{
        $message = "Data gagal Dihapus";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'matkul.php';</script>";
    }
?>