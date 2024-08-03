<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id_sekolah'];

// Delete related rows from data_ptkpd
// First, get the id_rekap from the rekap table using the id_sekolah
$result_rekap = mysqli_query($koneksi, "SELECT id_rekap FROM rekap WHERE id_sekolah='$id'");
$row_rekap = mysqli_fetch_assoc($result_rekap);
$id_rekap = $row_rekap['id_rekap'];

// Now, delete the record from data_ptkpd using the id_rekap
mysqli_query($koneksi, "DELETE FROM data_ptkpd WHERE id_rekap='$id_rekap'");

// Delete related rows from rekap
mysqli_query($koneksi, "DELETE FROM rekap WHERE id_sekolah='$id'");

// Delete related rows from kurikulum
mysqli_query($koneksi, "DELETE FROM kurikulum WHERE id_sekolah='$id'");

// Delete related rows from gambar_sekolah
mysqli_query($koneksi, "DELETE FROM gambar_sekolah WHERE id_sekolah='$id'");

// Delete the row from sekolah
$query = mysqli_query($koneksi, "DELETE FROM sekolah WHERE id_sekolah='$id'");

if ($query) {
    echo "<script>alert('Data Berhasil Dihapus!'); window.location = 'tampil_data.php'</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus! Error: " . mysqli_error($koneksi) . "'); window.location = 'tampil_data.php'</script>";
}
?>
