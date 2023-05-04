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
                    <td>Nama Matkul</td>
                    <td>:</td>
                    <td><input type="text" name="nama_matkul"></td>
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
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td>:</td>
                    <td><input type="number" name="sks"></td>
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
            <th style="border: 1px solid black;">Kode Matkul </th>
            <th style="border: 1px solid black;">Matkul</th>
            <th style="border: 1px solid black;">Kelas</th>
            <th style="border: 1px solid black;">Sks</th>
            <th style="border: 1px solid black;">Action</th>
        </tr>
        <?php 
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM matkul, kelas WHERE matkul.id_kelas = kelas.id");
        while($d = mysqli_fetch_assoc($data)){
        ?>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;"><?= $no++; ?></td>
            <td style="border: 1px solid black;"><?= $d["kode_matkul"]; ?></td>
            <td style="border: 1px solid black;"><?= $d["nama_matkul"]; ?></td>
            <td style="border: 1px solid black;"><?= $d['kode_kelas']; ?></td>
            <td style="border: 1px solid black;"><?= $d['sks']; ?></td>
            <td style="border: 1px solid black;">
                <a href="edit.php?kode_matkul=<?= $d["kode_matkul"]?>">Edit</a>
                <a href="delete.php?kode_matkul=<?= $d["kode_matkul"]?>" onclick="return confirm('Apakah anda yakin menghapus data ini ?');">Hapus</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
</body>
</html>