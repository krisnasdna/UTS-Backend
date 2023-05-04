<?php

include 'config.php';

$id = $_GET ['id'];
$sql = "DELETE FROM kelas where id = '$id'";
    if(mysqli_query($conn, $sql)){
        $message = "Data Berhasil dihapus";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'kelas.php';</script>";
    }
    else{
        $message = "Data gagal Dihapus";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'kelas.php';</script>";
    }
?>