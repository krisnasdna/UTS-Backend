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
        $kode_matkul = $_GET['kode_matkul'];
        $data = mysqli_query($conn,"SELECT * FROM matkul WHERE kode_matkul = '$kode_matkul' ");
        while($d = mysqli_fetch_assoc($data)){
        ?> 
            <form action="update.php" method="POST">
                    <fieldset>
                        <legend>Form Biodata Mahasiswa</legend>
                        <table>
                            <tr>
                                <td>Kode Matkul</td>
                                <td>:</td>
                                <td><input type="text" name="kode_matkul" value="<?= $d["kode_matkul"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Nama Matkul</td>
                                <td>:</td>
                                <td><input type="text" name="nama_matkul"  value="<?= $d["nama_matkul"];?>"></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>
                                <select name="id_kelas">
                                    <?php 
                                        $kelas = mysqli_query($conn, "SELECT * FROM kelas");
                                        while($data_kelas = mysqli_fetch_assoc($kelas)){
                                    ?>
                                        <option value="<?= $data_kelas["id"]; ?>"><?= $data_kelas["kode_kelas"]; ?></option>
                                    <?php 
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>SKS</td>
                                <td>:</td>
                                <td><input type="text" name="sks" value="<?= $d["sks"];?>"></td>
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