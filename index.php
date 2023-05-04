<?php 
    include 'layout/header.php';

    $data = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>
<section>
      <div class="container my-5">
        <div class="row">
          <div class="col-12 my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Tambah
            </button>
          </div>
          <div class="col-12 my-3">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nim</th>
                  <th scope="col">Nama Mahasiswa</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">No HP</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                    $no = 1;
                    while($d = mysqli_fetch_assoc($data)){
                ?>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td><?= $d["nim"]; ?></td>
                  <td><?= $d["nama_mhs"]; ?></td>
                  <td><?= $d['kd_jurusan']; ?></td>
                  <td><?= $d['gender'] == 1 ? 'Laki-Laki': 'Perempuan'; ?></td>
                  <td><?= $d['alamat']; ?></td>
                  <td><?= $d['no_hp']; ?></td>
                  <td><?= $d['email']; ?></td>
                  <td>
                    <a button type="button" data-bs-toggle="modal" data-bs-target="#editmhs<?= $d['nim'] ?>" class="text-decoration-none">Edit</a> 
                    |
                    <a button type="button" data-bs-toggle="modal" data-bs-target="#hapusmhs<?= $d['nim'] ?>"class="text-decoration-none">Hapus</a>  
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Biodata Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="function_mhs.php?action=insert" method="POST">
            <table>
                <tr>
                    <td>NIM (Nomor Induk Mahasiswa)</td>
                    <td></td>
                    <td><input type="text" name="nim"></td>
                </tr>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td></td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td></td>
                    <td><select name="jurusan">
                        <option value="001">Sistem Komputer</option>
                        <option value="002">Sistem Informasi</option>
                        <option value="003">Teknologi Informasi</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td></td>
                    <td>
                        <input type="radio" name="gender" value="1" > Laki-laki
                        <input type="radio" name="gender" value="2"> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td></td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td></td>
                    <td><input type="number" name="no_hp"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td></td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
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
<div class="modal fade" id="hapusmhs<?= $d['nim'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Biodata Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>Apakah Yakin Menghapus data?</p>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <a href="delete_mhs.php?nim=<?= $d['nim'] ?>"class="btn btn-primary" type="submit" value="Simpan" >Simpan</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php foreach($data as $d) : ?>
<!-- modal edit -->
<div class="modal fade" id="editmhs<?= $d['nim'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Biodata Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="function_mhs.php?action=update" method="POST">
        <table>
            <tr>
                <td>NIM (Nomor Induk Mahasiswa)</td>
                <td>:</td>
                <td><input type="text" name="nim" value="<?= $d["nim"];?>" readonly></td>
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