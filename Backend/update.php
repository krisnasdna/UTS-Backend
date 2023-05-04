<?php 
include 'config.php';

$nim = $_POST ['nim'];
$nama_mhs = $_POST ['nama'];
$kd_jurusan = $_POST ['jurusan'];
$gender = $_POST ['gender'];
$alamat = $_POST ['alamat'];
$no_hp = $_POST ['no_hp'];
$email = $_POST ['email'];
$exec = mysqli_query($conn, "UPDATE mahasiswa set nama_mhs = '$nama_mhs', kd_jurusan = '$kd_jurusan', gender = '$gender', alamat = '$alamat',no_hp = '$no_hp', email = '$email' WHERE nim = '$nim' ");
if ($exec){
    $message = "Data Berhasil Dirubah";
    echo "<script type='text/javascript'>window.alert('$message'); window.location = 'index.php';</script>";
}
else{
    echo"data gagal dirubah";
}
?>