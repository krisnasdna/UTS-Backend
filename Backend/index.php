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
    <form action="proses.php" method="POST">
        <fieldset>
            <legend>Form Biodata Mahasiswa</legend>
            <h3>Lengkapi Biodata dengan benar</h3>
            <table>
                <tr>
                    <td>NIM (Nomor Induk Mahasiswa)</td>
                    <td>:</td>
                    <td><input type="text" name="nim"></td>
                </tr>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
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
                        <input type="radio" name="gender" value="1" > Laki-laki
                        <input type="radio" name="gender" value="2"> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type="text" name="alamat"></td>
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
            <th style="border: 1px solid black;">Nim </th>
            <th style="border: 1px solid black;">Nama Mahasiswa</th>
            <th style="border: 1px solid black;">Jurusan</th>
            <th style="border: 1px solid black;">Jenis Kelamin</th>
            <th style="border: 1px solid black;">Alamat</th>
            <th style="border: 1px solid black;">No HP</th>
            <th style="border: 1px solid black;">Email</th>
            <th style="border: 1px solid black;">Action</th>
        </tr>
        <?php 
        $no = 1;
        while($d = mysqli_fetch_assoc($data)){
        ?>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;"><?= $no++; ?></td>
            <td style="border: 1px solid black;"><?= $d["nim"]; ?></td>
            <td style="border: 1px solid black;"><?= $d["nama_mhs"]; ?></td>
            <td style="border: 1px solid black;"><?= $d['kd_jurusan']; ?></td>
            <td style="border: 1px solid black;"><?= $d['gender'] == 1 ? 'Laki-Laki': 'Perempuan'; ?></td>
            <td style="border: 1px solid black;"><?= $d['alamat']; ?></td>
            <td style="border: 1px solid black;"><?= $d['no_hp']; ?></td>
            <td style="border: 1px solid black;"><?= $d['email']; ?></td>
            <td style="border: 1px solid black;">
                <a href="edit.php?nim=<?= $d["nim"]?>">Edit</a>
                <a href="delete.php?nim=<?= $d["nim"]?>" onclick="return confirm('Apakah anda yakin menghapus data ini ?');">Hapus</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
</body>
</html>