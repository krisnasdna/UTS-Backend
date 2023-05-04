<?php 
    include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Latihan</title>
</head>
<style>
</style>
<body>
    <?php 
        $kode_dosen = $_GET['kode_dosen'];
        $data = mysqli_query($conn,"SELECT * FROM dosen WHERE kode_dosen= '$kode_dosen' ");
        while($d = mysqli_fetch_assoc($data)){
        ?> 
            <form action="update.php" method="POST">
                    <fieldset>
                        <legend>Form Biodata Mahasiswa</legend>
                        <table>
                            <tr>
                                <td>Kode Dosen</td>
                                <td>:</td>
                                <td><input type="text" name="kode_dosen" value="<?= $d["kode_dosen"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Nama Dosen</td>
                                <td>:</td>
                                <td><input type="text" name="nama"  value="<?= $d["nama"];?>"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    <?php
                                        if($d['gender'] == 1){
                                    ?>
                                     <input type="radio" name="gender" value="1" checked > Laki-laki
                                    <input type="radio" name="gender" value="2"> Perempuan
                                    <?php } else { ?>
                                    <input type="radio" name="gender" value="1"  > Laki-laki
                                    <input type="radio" name="gender" value="2" checked> Perempuan    
                                    <?php }?>
                                </td>    
                                   
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td><input type="number" name="no_hp" value="<?= $d["no_hp"];?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><input type="email" name="email" value="<?= $d["email"];?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="submit" value="Simpan"><input type="button" value="Kembali"></td>
                            </tr>
                        </table>
                    </fieldset>
            </form>
        <?php
        }
        ?>
    
</body>
</html>