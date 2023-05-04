<?php 
    include 'layout/header.php';

    $data = mysqli_query($conn, "SELECT * FROM matkul");
?>
<section>
      <div class="container my-5">
        <div class="row">
          <div class="col-12 my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insert_matkul">
              Tambah
            </button>
          </div>
          <div class="col-12 my-3">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode Kelas</th>
                  <th scope="col">Matkul</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">SKS</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                    $no = 1;
                    $datas = mysqli_query($conn, "SELECT * FROM matkul,kelas where matkul.id_kelas = kelas.id");
                    while($all = mysqli_fetch_assoc($datas)){
                ?>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td><?= $all["kode_matkul"]; ?></td>
                  <td><?= $all["nama_matkul"]; ?></td>
                  <td><?= $all['kode_kelas']; ?></td>
                  <td><?= $all['sks']; ?></td>
                  <td>
                    <a button type="button" data-bs-toggle="modal" data-bs-target="#editmatkul<?= $all['kode_matkul'] ?>" class="text-decoration-none">Edit</a> 
                    |
                    <a button type="button" data-bs-toggle="modal" data-bs-target="#hapusmatkul<?= $all['kode_matkul'] ?>"class="text-decoration-none">Hapus</a>  
                  </td>
                </tr>
                <?php 
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
<!-- Button trigger modal -->

<!-- Modal insert -->
<div class="modal fade" id="insert_matkul" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Kelas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="function_matkul.php?action=insert" method="POST">
            <table>
                <tr>
                    <td>Nama Matkul</td>
                    <td></td>
                    <td><input type="text" name="nama_matkul"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td></td>
                    <td>
                    <select name="id_kelas">
                        <?php 
                            $kelas = mysqli_query($conn, "SELECT * FROM kelas");
                            while($d = mysqli_fetch_assoc($kelas)){
                        ?>
                        <option value="<?= $d["id"]; ?>"><?= $d["kode_kelas"]; ?></option>
                        <?php
                         }
                        ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Sks</td>
                    <td></td>
                    <td><input type="text" name="sks"></td>
                </tr>
            </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button class="btn btn-primary" type="submit" value="Simpan" >Simpan</button>
            </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php foreach($data as $d) :?>
<!-- modal hapus -->
<div class="modal fade" id="hapusmatkul<?= $d['kode_matkul'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>Apakah Yakin Menghapus data?</p>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <a href="delete_matkul.php?kode_matkul=<?= $d['kode_matkul'] ?>"class="btn btn-primary" type="submit" value="Simpan" >Simpan</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php foreach($data as $d) : ?>
<!-- modal edit -->
<div class="modal fade" id="editmatkul<?= $d['kode_matkul'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Matkul</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="function_matkul.php?action=update" method="POST">
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
                        while($datakelas = mysqli_fetch_assoc($kelas)){
                    ?>
                    <option value="<?= $datakelas["id"]; ?>"><?= $datakelas["kode_kelas"]; ?></option>
                    <?php
                        };
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>SKS</td>
                <td>:</td>
                <td><input type="number" name="sks" value="<?= $d["sks"];?>"></td>
            </tr>
        </table>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button class="btn btn-primary" type="submit" value="Simpan" >Simpan</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php 
    include 'layout/footer.php';
?>