<?php 
    include 'config.php';
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
        $nim = $_GET['nim'];
        $data = mysqli_query($conn,"SELECT * FROM mahasiswa WHERE nim = '$nim' ");
        while($d = mysqli_fetch_assoc($data)){
        ?> 
            <form action="update.php" method="POST">
                    <fieldset>
                        <legend>Form Biodata Mahasiswa</legend>
                        <table>
                            <tr>
                                <td>NIM (Nomor Induk Mahasiswa)</td>
                                <td>:</td>
                                <td><input type="text" name="nim" value="<?= $d["nim"];?>"></td>
                            </tr>
                            <tr>
                                <td>Nama Mahasiswa</td>
                                <td>:</td>
                                <td><input type="text" name="nama"  value="<?= $d["nama_mhs"];?>"></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td><select name="jurusan">
                                    <option value="001">Sistem Komputer</option>
                                    <option value="002">Sistem Informasi</option>
                                    <option value="003">Teknologi Informasi</option>
                                </select></td>
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
                                <td>Alamat</td>
                                <td>:</td>
                                <td><input type="text" name="alamat" value="<?= $d["alamat"];?>"></td>
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