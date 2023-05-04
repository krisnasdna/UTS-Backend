<?php 
include '../config.php';

$kode_dosen = $_POST ['kode_dosen'];
$nama_dosen = $_POST ['nama'];
$gender = $_POST ['gender'];
$no_hp = $_POST ['no_hp'];
$email = $_POST ['email'];
$exec = mysqli_query($conn, "UPDATE dosen set nama = '$nama_dosen', gender = '$gender', no_hp = '$no_hp', email = '$email' WHERE kode_dosen= '$kode_dosen' ");
if ($exec){
    $message = "Data Berhasil Dirubah";
    echo "<script type='text/javascript'>window.alert('$message'); window.location = 'index.php';</script>";
}
else{
    echo"data gagal dirubah";
}
?>