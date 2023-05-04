<?php 
    include 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTS BACKEN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0a83da; font-family: roboto;">
        <div class="container">
          <a class="navbar-brand" href="#">Data</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse  justify-content-center" id="navbarNav">
            <ul class="navbar-nav" >
              <li class="nav-item">
                <a class="nav-link " href="index.php">Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="matkul.php">Matkul</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kelas.php">Kelas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dosen.php">Dosen</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>