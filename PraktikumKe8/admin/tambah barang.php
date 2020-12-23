<?php
require 'functions.php';
//cek submit apakah udah ditekan
if( isset($_POST["submit"]) ){

    //cek data apakah berhasil atau tidak ditambahakan
    if( tambah($_POST) > 0 ){
      echo "
          <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'lihat barang.php';
          </script>
          ";
    }else{
      echo "
          <script>
            alert('data gagal ditambahkan');
            document.location.href = 'lihat barang.php';
          </script>
          ";
    }

};

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">ADMIN Capture Moment</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">
              Dashboard 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lihat pembelian.php">
              Lihat Data Pesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lihat customer.php">
              Lihat Customer
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lihat barang.php">
              Lihat Barang
            </a>
          </li>
        </ul>

        
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Barang</h1>
      </div>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="kode_barang" class="form-label">Kode Barang</label>
          <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="" required>
          <br>
          <label for="nama_barang" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="" required>
          <br>
          <label for="kategori" class="form-label">Kategori Barang</label>
          <input type="text" class="form-control" id="kategori" name="kategori" placeholder="" required>
          
          <br>
          <label for="spesifikasi" class="form-label">Spesifikasi Produk</label>
          <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="3" required></textarea>
          <br>
          <label for="harga_barang" class="form-label">Harga Barang</label>
          <input type="number" class="form-control" id="harga_barang" name="harga_barang" placeholder="" required>
          <br>
          <label for="foto_produk" class="form-label">Masukan Foto Produk</label>
          <input class="form-control" type="file" id="foto_produk" name="foto_produk" required>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-success me-md-2" type="submit" value="Submit" name="submit">Simpan</button>
          <button class="btn btn-danger" type="reset" value="Reset">Batal</button>
        </div>
      </form>
      <br>


    </main>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="css/dashboard.js"></script></body>
</html>
