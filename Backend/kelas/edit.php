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
        $id = $_GET['id'];
        $data = mysqli_query($conn,"SELECT * FROM kelas WHERE id= '$id' ");
        while($d = mysqli_fetch_assoc($data)){
        ?> 
            <form action="update.php" method="POST">
                    <fieldset>
                        <legend>Form Biodata Mahasiswa</legend>
                        <table>
                            <tr>
                                <td><input type="hidden" name="id" value="<?= $d["id"];?>"></td></td>
                            </tr>
                            <tr>
                                <td>Kode Kelas</td>
                                <td>:</td>
                                <td><input type="text" name="kode_kelas" value="<?= $d["kode_kelas"];?>"></td>
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