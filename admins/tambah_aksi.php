<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// koneksi database
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$nama_sekolah = $_POST['nama_sekolah'];
$nama_kepsek = $_POST['nama_kepsek'];
$akreditasi = $_POST['akreditasi'];
$kebsus = $_POST['kebsus'];
$kurikulum = $_POST['kurikulum'];
$status = $_POST['status'];
$npsn = $_POST['npsn'];
$bentukpend = $_POST['bentukpend'];
$statuspem = $_POST['statuspem'];
$tglpen = $_POST['tglpen'];
$tglskpen = $_POST['tglskpen'];
$skizin = $_POST['skizin'];
$r_pimpinan = $_POST['r_pimpinan'];
$r_guru = $_POST['r_guru'];
$r_kelas = $_POST['r_kelas'];
$r_perpus = $_POST['r_perpus'];
$r_labo = $_POST['r_labo'];
$r_prak = $_POST['r_prak'];
$r_ibadah = $_POST['r_ibadah'];
$r_uks = $_POST['r_uks'];
$r_tu = $_POST['r_tu'];
$r_bk = $_POST['r_bk'];
$r_osis = $_POST['r_osis'];
$r_toilet = $_POST['r_toilet'];
$r_gudang = $_POST['r_gudang'];
$r_berolahraga = $_POST['r_berolahraga'];
$alamat = $_POST['alamat'];
$rtrw = $_POST['rtrw'];
$kelurahan = $_POST['kelurahan'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];
$provinsi = $_POST['provinsi'];
$kode_pos = $_POST['kode_pos'];
$notelp = $_POST['notelp'];
$nofaks = $_POST['nofaks'];
$email = $_POST['email'];
$situs = $_POST['situs'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Handle image uploads
$targetDir = "./img/savedimg/";

// Insert school data into the database
mysqli_query($koneksi, "INSERT INTO sekolah (nama_sekolah, nama_kepsek, akreditasi, kebsus, kurikulum, latitude, longitude) VALUES ('$nama_sekolah', '$nama_kepsek', '$akreditasi', '$kebsus', '$kurikulum', '$latitude', '$longitude')");

// Get the last inserted school ID
$id_sekolah = mysqli_insert_id($koneksi);

// Iterate over each uploaded file
$uploadedFiles = $_FILES['gambar'];
$totalFiles = count($uploadedFiles['name']);

for ($i = 0; $i < $totalFiles; $i++) {
    $fileName = basename($uploadedFiles['name'][$i]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if the file is an actual image
    $check = getimagesize($uploadedFiles['tmp_name'][$i]);
    if ($check !== false) {
        // Move the uploaded file to the destination directory
        move_uploaded_file($uploadedFiles['tmp_name'][$i], $targetFilePath);
        echo "File uploaded successfully: " . $fileName . "<br>";

        // Get alt text for the image
        $altText = isset($_POST['alt_text'][$i]) ? $_POST['alt_text'][$i] : '';
        $altText = mysqli_real_escape_string($koneksi, $altText); // Escape the alt text

        // Save the image path and alt text to the database
        $imagePath = $targetFilePath;
        $query = "INSERT INTO gambar_sekolah (id_sekolah, gambar, alt_text) VALUES ($id_sekolah, '$imagePath', '$altText')";
        mysqli_query($koneksi, $query);
    } else {
        echo "File is not an image: " . $fileName . "<br>";
    }
}


// Insert profil data into the database
mysqli_query($koneksi, "INSERT INTO profil (id_sekolah, status, npsn, bentukpend, statuspem, tglpen, tglskpen, skizin) VALUES ($id_sekolah, '$status', '$npsn', '$bentukpend', '$statuspem', '$tglpen', '$tglskpen', '$skizin')");

// Insert rekap data into the database
mysqli_query($koneksi, "INSERT INTO rekap (id_sekolah, r_pimpinan, r_guru, r_kelas, r_perpus, r_labo, r_prak, r_ibadah, r_uks, r_tu, r_bk, r_osis, r_toilet, r_gudang, r_berolahraga) VALUES ($id_sekolah, '$r_pimpinan', '$r_guru', '$r_kelas', '$r_perpus', '$r_labo', '$r_prak', '$r_ibadah', '$r_uks', '$r_tu', '$r_bk', '$r_osis', '$r_toilet', '$r_gudang', '$r_berolahraga')");

// Get the last inserted rekap ID
$id_rekap = mysqli_insert_id($koneksi);

// Insert data_ptkpd into the database
$guru_laki = $_POST['guru_laki'];
$guru_perem = $_POST['guru_perem'];
$tendik_laki = $_POST['tendik_laki'];
$tendik_perem = $_POST['tendik_perem'];
$pd_laki = $_POST['pd_laki'];
$pd_perem = $_POST['pd_perem'];

mysqli_query($koneksi, "INSERT INTO data_ptkpd (id_rekap, guru_laki, guru_perem, tendik_laki, tendik_perem, pd_laki, pd_perem) VALUES ($id_rekap, $guru_laki, $guru_perem, $tendik_laki, $tendik_perem, $pd_laki, $pd_perem)");

// Insert contact data into the database
mysqli_query($koneksi, "INSERT INTO kontak (id_sekolah, alamat, rtrw, kelurahan, kecamatan, kabupaten, provinsi, kode_pos, notelp, nofaks, email, situs) VALUES ($id_sekolah, '$alamat', '$rtrw', '$kelurahan', '$kecamatan', '$kabupaten', '$provinsi', '$kode_pos', '$notelp', '$nofaks', '$email', '$situs')");

// Redirect back to tampil_data.php
if (mysqli_affected_rows($koneksi) > 0) {
    echo '<script>alert("Data berhasil ditambahkan")</script>';
} else {
    echo '<script>alert("Data gagal ditambahkan")</script>';
}

header("location:tampil_data.php");
exit;
?>
