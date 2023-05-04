<?php

include 'config.php';

if($_GET['action'] == 'insert'){
    $nama_dosen = $_POST ['nama'];
    $gender = $_POST ['gender'];
    $no_hp = $_POST ['no_hp'];
    $email = $_POST ['email'];
    
    $query = mysqli_query($conn, "SELECT max(kode_dosen) as max_kode FROM dosen");
    $data = mysqli_fetch_array($query);
    $kode = $data['max_kode'];
    
    $urutan = (int) substr($kode, 3, 3);
    $urutan++;
    
    $huruf = 'KD';
    $kode_dosen = $huruf . sprintf("%03s", $urutan);
    var_dump($data);
    
    $sql = "INSERT INTO dosen (kode_dosen,nama,gender,email,no_hp) 
    VALUES ('$kode_dosen','$nama_dosen','$gender','$email','$no_hp' )";
        if(mysqli_query($conn, $sql)){
            $message = "Data Berhasil Dimasukan";
            echo "<script type='text/javascript'>window.alert('$message'); window.location = 'dosen.php';</script>";
        }
        else{
            $message = "Data Gagal Dimasukan";
            echo "<script type='text/javascript'>window.alert('$message'); window.location = 'dosen.php';</script>";
        }
        mysqli_close($conn);
}
else if($_GET['action'] == 'update'){

    $kode_dosen = $_POST ['kode_dosen'];
    $nama_dosen = $_POST ['nama'];
    $gender = $_POST ['gender'];
    $no_hp = $_POST ['no_hp'];
    $email = $_POST ['email'];
    
    $exec = mysqli_query($conn, "UPDATE dosen set nama = '$nama_dosen', gender = '$gender',email = '$email', no_hp = '$no_hp' WHERE kode_dosen= '$kode_dosen' ");
    if ($exec){
        $message = "Data Berhasil Dirubah";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'dosen.php';</script>";
    }
    else{
        $message = "Data Gagal Dirubah";
        echo "<script type='text/javascript'>window.alert('$message'); window.location = 'dosen.php';</script>";
    }
}


?>