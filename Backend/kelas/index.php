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
    <form action="proses.php" method="POST">
        <fieldset>
            <legend>Form Biodata Mahasiswa</legend>
            <h3>Lengkapi Biodata dengan benar</h3>
            <table>
                <tr>
                    <td>Kode Kelas</td>
                    <td>:</td>
                    <td><input type="text" name="kode_kelas"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="Simpan"><input type="button" value="Kembali"></td>
                </tr>
            </table>
        </fieldset>
    </form>

    <table style="margin-top: 20px;">
        <tr style="border: 1px solid black;">
            <th style="border: 1px solid black;">NO </th>
            <th style="border: 1px solid black;">Kelas </th>
            <th style="border: 1px solid black;">Action</th>
        </tr>
        <?php 
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM kelas");
        while($d = mysqli_fetch_assoc($data)){
        ?>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;"><?= $no++; ?></td>
            <td style="border: 1px solid black;"><?= $d["kode_kelas"]; ?></td>
            <td style="border: 1px solid black;">
                <a href="edit.php?id=<?= $d["id"]?>">Edit</a>
                <a href="delete.php?id=<?= $d["id"]?>" onclick="return confirm('Apakah anda yakin menghapus data ini ?');">Hapus</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
</body>
</html>