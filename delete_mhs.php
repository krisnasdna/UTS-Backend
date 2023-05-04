<?php

include 'config.php';

$nim = $_GET ['nim'];
$sql = "DELETE FROM mahasiswa where nim = '$nim'";
    if(mysqli_query($conn, $sql)){
        $message = "Data Berhasil dihapus";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'index.php';</script>";
    }
    else{
        $message = "Data gagal Dihapus";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'index.php';</script>";
    }
?>