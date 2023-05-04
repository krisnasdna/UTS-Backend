<?php

include '../config.php';

$nama_matkul = $_POST ['nama_matkul'];
$id_kelas= $_POST ['id_kelas'];
$sks = $_POST ['sks'];

$query = mysqli_query($conn, "SELECT max(kode_matkul) as max_kode FROM matkul");
$data = mysqli_fetch_array($query);
$kode = $data['max_kode'];

$urutan = (int) substr($kode, 3, 3);
$urutan++;

$huruf = 'KM';
$kode_matkul = $huruf . sprintf("%03s", $urutan);
var_dump($data);

$sql = "INSERT INTO matkul (kode_matkul,nama_matkul,id_kelas,sks) 
VALUES ('$kode_matkul','$nama_matkul','$id_kelas','$sks')";
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