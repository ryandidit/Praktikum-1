<?php
session_start();

if ( !isset($_SESSION["login"])) {
  header("location: signin.php");
  exit;
}

require 'functions.php';

//konfigurasi pagination
$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM tb_user"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$user = query("SELECT * FROM tb_user LIMIT $awalData, $jumlahDataPerHalaman");

//tombol cari ditekan
if ( isset($_POST["cari"]) ) {
    $user = cari($_POST["keyword"]);
}

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
  <form class="form-inline" action="" method="POST">
    <input class="form-control form-control-dark mr-sm-2" type="search" aria-label="Search" 
            name="keyword" id="keyword" size="105" placeholder="Masukan Keyword Pencarian..." autocomplete="off" >
    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="cari" id="cari">Search</button>
  </form>
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
        <h1 class="h2">Lihat Customer</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <!--<a class="btn btn-outline-primary" href="tambah barang.php">Tambah Barang +</a>-->
        </div>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Foto User</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Username</th>
            <th scope="col">E-mail</th>
            <th scope="col">No.Telpon</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ( $user as $row ) : ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><img src="img/<?= $row["foto"]; ?>" width="50px"></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["username"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["no_telpon"]; ?></td>
            <td><a class="btn btn-outline-primary btn-sm" href="ubah user.php?id=<?= $row["id"]; ?>" role="button">Ubah</a>
              <a class="btn btn-outline-danger btn-sm" href="hapus user.php?id=<?= $row["id"]; ?>" 
                  onclick="return confirm('Yakin data dihapus?')" role="button">Hapus</a></td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
          
        </tbody>
      </table>
      <br>
      
      
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <?php if ( $halamanAktif > 1 ) : ?>
              <li class="page-item">
                <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
          <?php endif; ?>

          <?php for ( $i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <?php if ( $i == $halamanAktif ) : ?>
              <li class="page-item active" aria-current="page"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a><li>
            <?php else : ?>
              <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a><li>
            <?php endif; ?>
          <?php endfor; ?>

          <?php if ( $halamanAktif < $jumlahHalaman ) : ?>
              <li class="page-item">
                <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
          <?php endif; ?>
        </ul>
      </nav>
      

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
