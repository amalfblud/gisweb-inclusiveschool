<?php 
session_start();
include 'koneksi.php';


  $username= $_POST['username'];
  $password = $_POST["password"];

  $sql = "select * from admin where username='$username' and password ='$password'";

  $result = $koneksi->query($sql);

  $cek = mysqli_num_rows($result);
  if($cek>0){
    $_SESSION["username"] = $username;
    $_SESSION["status"]=  "login";
    header("location:index.php");
    //if ($_POST["username"]=="$uname" && $_POST["password"]=="$password"){
    //    header("location:home.php");
    }
    else{
    //    echo "Maaf Username Atau Password Salah !";
    header("location:login.php?pesan=gagal");
    }
 //}


 ?>