<?php 
session_start();

if ( !isset($_SESSION["login"])) {
  header("location: signin.php");
  exit;
}

require 'functions.php';

//ambil data dari url
$id = $_GET["id"];
//query data berdasarkan id
$user = query("SELECT * FROM tb_user WHERE id = $id")[0];

//cek submit apakah udah ditekan
if( isset($_POST["submit"]) ){
    //cek data apakah berhasil atau tidak diubah
    if( ubahUser($_POST) > 0 ){
      echo "
          <script>
            alert('data berhasil diubah');
            document.location.href = 'lihat customer.php';
          </script>
          ";
    }else{
      echo "
          <script>
            alert('data gagal diubah');
            document.location.href = 'lihat customer.php';
          </script>
          ";
    }

};

?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Register Form</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer/">

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
    <link href="sticky-footer.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <!-- Begin page content -->
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


    <main role="main" class="col-md-9 ml-sm-5 col-lg-5 px-md-4" >
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ubah Registrasi User</h1>
          </div>

          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $user["id"]?>">
            <input type="hidden" name="gambarLama" value="<?= $user["foto"]?>">
            <input type="hidden" name="password" value="<?= $user["password"]?>">
            <input type="hidden" name="password2" value="<?= $user["password2"]?>">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" 
                      placeholder="" required value="<?= $user["nama"]?>" >
              <br>
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" 
                      placeholder=""  value="<?= $user["email"]?>" >
              <br>
              <label for="no_telpon" class="form-label">No. Telpon</label>
              <input type="tel" class="form-control" id="no_telpon" name="no_telpon" 
                      placeholder=""  autocomplete="off" value="<?= $user["no_telpon"]?>">
              <br>
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" 
                      placeholder="" required value="<?= $user["username"]?>" >
              <br>
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" 
                      placeholder="" >
              <br>
              <label for="password2" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="password2" name="password2" 
                      placeholder="" >
              <br>

              <label for="foto" class="form-label">Masukan Foto User</label>
              <input class="form-control" type="file" id="foto" name="foto" > <br>
              <img src="img/<?= $user["foto"]?>" width="50px"> <label for="foto" class="form-label"><?= $user["foto"]?></label>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-success me-md-2" type="submit" name="submit">Register</button>
              <a class="btn btn-danger" type="reset" href="lihat customer.php" value="Reset">Batal</a>
            </div>
          </form>
          <br>
    </main>
  </div>
</div>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Pbw Kel.2 2020</span>
  </div>
</footer>
</body>
</html>
