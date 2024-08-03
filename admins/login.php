<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <title> Login </title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- CSS -->
  <link href="css/style.css" rel="stylesheet">
</head>

<?php 
session_start();
include "koneksi.php";
if(isset($_SESSION['status'])){
  if($_SESSION['status'] == "login"){
    header("location:index.php");
  }
}

$loginMessage = "";
if(isset($_GET['pesan'])){
  if($_GET['pesan'] == "gagal"){
    $loginMessage = "Maaf, Username dan Password salah";
    echo "<script>$(document).ready(function(){ $('#loginModal').modal('show'); });</script>";
  } else if($_GET['pesan'] == "logout"){
    $loginMessage = "Berhasil logout!";
    echo "<script>$(document).ready(function(){ $('#loginModal').modal('show'); });</script>";
  } else if($_GET['pesan'] == "belum_login"){
    $loginMessage = "Silakan login untuk mengakses!";
    echo "<script>$(document).ready(function(){ $('#loginModal').modal('show'); });</script>";
  }
}
?>

<body>
  <div class="container">
    <h1>Login</h1>
    <form method="post" action="ceklogin.php">
      Username: <input type="text" name="username" placeholder="Username" required>
      Password: <input type="password" name="password" placeholder="Password" required>
      <button class="login-button" type="submit">Login</button>
    </form>
    <button class="back-button" onclick="goBack()">Kembali</button>

    <script>
      function goBack() {
        window.location.href = "../index.php";
      }
    </script>
  </div>

  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Konfirmasi Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo $loginMessage; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
