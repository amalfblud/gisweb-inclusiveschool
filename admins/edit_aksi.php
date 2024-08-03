<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// koneksi database
include '../koneksi.php';

// Menangkap data yang di kirim dari form
$id_sekolah = $_POST['id_sekolah'];
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


// Update data in the sekolah table
mysqli_query($koneksi, "UPDATE sekolah SET nama_sekolah='$nama_sekolah', nama_kepsek='$nama_kepsek', akreditasi='$akreditasi', kebsus='$kebsus', kurikulum='$kurikulum' WHERE id_sekolah='$id_sekolah'");

// Delete previous images from the database and server
$prevImagesQuery = mysqli_query($koneksi, "SELECT gambar FROM gambar_sekolah WHERE id_sekolah='$id_sekolah'");
while ($prevImageRow = mysqli_fetch_assoc($prevImagesQuery)) {
    $prevImagePath = $prevImageRow['gambar'];
    unlink($prevImagePath); // Delete the image file from the server
}
mysqli_query($koneksi, "DELETE FROM gambar_sekolah WHERE id_sekolah='$id_sekolah'");

// Handle image uploads and alt text updates
$targetDir = "./img/savedimg/";
$uploadedFiles = $_FILES['gambar'];
$altTextArray = $_POST['alt_text']; // Get the array of alt text inputs

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
        $altText = isset($altTextArray[$i]) ? $altTextArray[$i] : '';
        $altText = mysqli_real_escape_string($koneksi, $altText); // Escape the alt text

        // Save the image path and alt text to the database
        $imagePath = $targetFilePath;
        $query = "INSERT INTO gambar_sekolah (id_sekolah, gambar, alt_text) VALUES ('$id_sekolah', '$imagePath', '$altText')";
        mysqli_query($koneksi, $query);
    } else {
        echo "File is not an image: " . $fileName . "<br>";
    }
}


// Update data in the profil table
mysqli_query($koneksi, "UPDATE profil SET status='$status', npsn='$npsn', bentukpend='$bentukpend', statuspem='$statuspem', tglpen='$tglpen', tglskpen='$tglskpen', skizin='$skizin' WHERE id_sekolah='$id_sekolah'");

// Update data in the rekap table
mysqli_query($koneksi, "UPDATE rekap SET r_pimpinan='$r_pimpinan', r_guru='$r_guru', r_kelas='$r_kelas', r_perpus='$r_perpus', r_labo='$r_labo', r_prak='$r_prak', r_ibadah='$r_ibadah', r_uks='$r_uks', r_tu='$r_tu', r_bk='$r_bk', r_osis='$r_osis', r_toilet='$r_toilet', r_gudang='$r_gudang', r_berolahraga='$r_berolahraga' WHERE id_sekolah='$id_sekolah'");

// Update data in the data_ptkpd table
$guru_laki = $_POST['guru_laki'];
$guru_perem = $_POST['guru_perem'];
$tendik_laki = $_POST['tendik_laki'];
$tendik_perem = $_POST['tendik_perem'];
$pd_laki = $_POST['pd_laki'];
$pd_perem = $_POST['pd_perem'];

$query = "UPDATE data_ptkpd SET guru_laki=$guru_laki, guru_perem=$guru_perem, tendik_laki=$tendik_laki, tendik_perem=$tendik_perem, pd_laki=$pd_laki, pd_perem=$pd_perem WHERE id_rekap=(SELECT id_rekap FROM rekap WHERE id_sekolah='$id_sekolah')";
mysqli_query($koneksi, $query);

// Update data in the kontak table
mysqli_query($koneksi, "UPDATE kontak SET alamat='$alamat', rtrw='$rtrw', kelurahan='$kelurahan', kecamatan='$kecamatan', kabupaten='$kabupaten', provinsi='$provinsi', kode_pos='$kode_pos', notelp='$notelp', nofaks='$nofaks', email='$email', situs='$situs' WHERE id_sekolah='$id_sekolah'");

// Redirect back to tampil_data.php
header("location:tampil_data.php");

