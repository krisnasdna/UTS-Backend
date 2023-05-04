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
                    <td>Nama Dosen</td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="gender" value="1" > Laki-laki
                        <input type="radio" name="gender" value="2"> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td><input type="number" name="no_hp"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="email" name="email"></td>
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
            <th style="border: 1px solid black;">Kode Dosen</th>
            <th style="border: 1px solid black;">Nama Dosen</th>
            <th style="border: 1px solid black;">Jenis Kelamin</th>
            <th style="border: 1px solid black;">No HP</th>
            <th style="border: 1px solid black;">Email</th>
            <th style="border: 1px solid black;">Action</th>
        </tr>
        <?php 
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM dosen");
        while($d = mysqli_fetch_assoc($data)){
        ?>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;"><?= $no++; ?></td>
            <td style="border: 1px solid black;"><?= $d["kode_dosen"]; ?></td>
            <td style="border: 1px solid black;"><?= $d["nama"]; ?></td>
            <td style="border: 1px solid black;"><?= $d['gender'] == 1 ? 'Laki-Laki': 'Perempuan'; ?></td>
            <td style="border: 1px solid black;"><?= $d['no_hp']; ?></td>
            <td style="border: 1px solid black;"><?= $d['email']; ?></td>
            <td style="border: 1px solid black;">
                <a href="edit.php?kode_dosen=<?= $d["kode_dosen"]?>">Edit</a>
                <a href="delete.php?kode_dosen=<?= $d["kode_dosen"]?>" onclick="return confirm('Apakah anda yakin menghapus data ini ?');">Hapus</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
</body>
</html>