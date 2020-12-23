<?php
session_start();

if ( isset($_SESSION["login"])) {
  header("location: dashboard.php");
  exit;
}

require 'functions.php';
//cek submit apakah udah ditekan
if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    //cek username
    if( mysqli_num_rows($result) === 1){
      //cek password
      $row = mysqli_fetch_assoc($result);
      if ( password_verify($password, $row["password"]) ){
        //set session
        $_SESSION["login"] = true;
        header("location: dashboard.php");
        exit;
      }
    }
    $error = true;

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

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
    <link href="css/signin.css" rel="stylesheet">
  </head>

  

  <body class="text-center">
    <form class="form-signin" action="" method="POST">
      <img class="mb-4" src="img/testtt.PNG" alt="">
      <h4 class="mb-3 font-weight-normal">Please sign in for Administrator</h4>
      <?php if( isset($error) ):?>
        <h9 class="form-label" style="color:red; font-style:italic">Username / Password Salah</h9>
      <?php endif; ?>
      <label for="username" class="sr-only">Username</label>
      <input type="text" id="username" class="form-control" placeholder="Username" name="username" required>
      <label for="ipassword" class="sr-only">Password</label>
      <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" id="login">Sign in</button><br>
      <a href="registrasi admin.php" class="form-label">Register</a>
    </form>
  
</body>
</html>
