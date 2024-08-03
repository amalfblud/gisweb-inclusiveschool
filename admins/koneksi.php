<?php


$koneksi = new mysqli("localhost","u1565190_si_slb","OnePiece19","u1565190_si_slb"); 

if (mysqli_connect_errno()){
    echo "Koneksi gagal ! " . mysqli_connect_error();
} 
//else {
//    echo "koneksi berhasil ";
//}
?>