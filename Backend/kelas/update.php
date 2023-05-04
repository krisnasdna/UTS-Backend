<?php 
include '../config.php';

$id = $_POST ['id'];
$kode_kelas = $_POST ['kode_kelas'];
$exec = mysqli_query($conn, "UPDATE kelas set kode_kelas = '$kode_kelas' WHERE id = '$id' ");
if ($exec){
    $message = "Data Berhasil Dirubah";
    echo "<script type='text/javascript'>window.alert('$message'); window.location = 'index.php';</script>";
}
else{
    echo"data gagal dirubah";
}
?>