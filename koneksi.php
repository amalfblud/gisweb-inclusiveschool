<?php
$host = "localhost";
$user = "u1565190_si_slb";
$pass = "OnePiece19";
$name = "u1565190_si_slb";

$koneksi = mysqli_connect($host, $user, $pass, $name);

// Check if the database connection was successful
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
if (!mysqli_select_db($koneksi, $name)) {
    die("Tidak ada database yang dipilih!");
}
