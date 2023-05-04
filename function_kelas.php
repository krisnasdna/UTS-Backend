<?php

include 'config.php';

if($_GET['action'] == 'insert'){
    $kode_kelas = $_POST ['kode_kelas'];

    $sql = "INSERT INTO kelas (id,kode_kelas) 
    VALUES ('','$kode_kelas')";
        if(mysqli_query($conn, $sql)){
            $message = "Data Berhasil Dimasukan";
            echo "<script type='text/javascript'>window.alert('$message'); window.location = 'kelas.php';</script>";
        }
        else{
            $message = "Data Gagal Dimasukan";
            echo "<script type='text/javascript'>window.alert('$message'); window.location = 'kelas.php';</script>";
        }
        mysqli_close($conn);
}
else if($_GET['action'] == 'update'){
    $id = $_POST ['id'];
    $kode_kelas = $_POST ['kode_kelas'];
    $exec = mysqli_query($conn, "UPDATE kelas set kode_kelas = '$kode_kelas' WHERE id = '$id' ");
    if ($exec){
        $message = "Data Berhasil Dirubah";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'kelas.php';</script>";
    }
    else{
        $message = "Data Gagal Dirubah";
            echo "<script type='text/javascript'>window.alert('$message'); window.location = 'kelas.php';</script>";
    }
}


?>