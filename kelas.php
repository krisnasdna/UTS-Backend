<?php 
    include 'layout/header.php';

    $data = mysqli_query($conn, "SELECT * FROM kelas");
?>
<section>
      <div class="container my-5">
        <div class="row">
          <div class="col-12 my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insert_kelas">
              Tambah
            </button>
          </div>
          <div class="col-12 my-3">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode Kelas</th>
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
                  <td><?= $d["kode_kelas"]; ?></td>
                  <td>
                    <a button type="button" data-bs-toggle="modal" data-bs-target="#editkelas<?= $d['id'] ?>" class="text-decoration-none">Edit</a> 
                    |
                    <a button type="button" data-bs-toggle="modal" data-bs-target="#hapuskelas<?= $d['id'] ?>"class="text-decoration-none">Hapus</a>  
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
<div class="modal fade" id="insert_kelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Kelas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="function_kelas.php?action=insert" method="POST">
            <table>
                <tr>
                    <td>Kode Kelas</td>
                    <td></td>
                    <td><input type="text" name="kode_kelas"></td>
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
<div class="modal fade" id="hapuskelas<?= $d['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            <a href="delete_kelas.php?id=<?= $d['id'] ?>"class="btn btn-primary" type="submit" value="Simpan" >Simpan</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php foreach($data as $d) :?>
<!-- modal edit -->
<div class="modal fade" id="editkelas<?= $d['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Update Kelas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="function_kelas.php?action=update" method="POST">
        <table>
            <tr>
                <td><input type="hidden" name="id" value="<?= $d["id"];?>" readonly></td>
            </tr>
            <tr>
                <td>Kode Kelas</td>
                <td>:</td>
                <td><input type="text" name="kode_kelas"  value="<?= $d["kode_kelas"];?>"></td>
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