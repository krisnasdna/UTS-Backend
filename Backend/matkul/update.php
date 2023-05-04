<?php 
include '../config.php';

$kode_matkul = $_POST ['kode_matkul'];
$nama_matkul = $_POST ['nama_matkul'];
$id_kelas = $_POST ['id_kelas'];
$sks = $_POST ['sks'];

$exec = mysqli_query($conn, "UPDATE matkul set nama_matkul = '$nama_matkul', id_kelas = '$id_kelas', sks = '$sks' WHERE kode_matkul= '$kode_matkul' ");
if ($exec){
    $message = "Data Berhasil Dirubah";
    echo "<script type='text/javascript'>window.alert('$message'); window.location = 'index.php';</script>";
}
else{
    echo"data gagal dirubah";
}
?>