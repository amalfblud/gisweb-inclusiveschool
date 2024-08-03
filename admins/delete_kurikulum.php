<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    // Check if the ID is provided in the URL
    if (isset($_GET['id'])) {
        // Include the database connection file
        include "../koneksi.php";

        // Sanitize the ID to prevent SQL injection
        $id = mysqli_real_escape_string($koneksi, $_GET['id']);

        // Perform the delete query
        $delete_query = mysqli_query($koneksi, "DELETE FROM kurikulum WHERE id_kurikulum='$id'");

        // Check if the delete operation was successful
        if ($delete_query) {
            // Redirect back to the lihat_kurikulum.php page with a success message
            header("Location: lihat_kurikulum.php?id_sekolah=".$_GET['id_sekolah']."&delete_success=true");
            exit();
        } else {
            // If there's an error, print the error message
            echo "Error: " . mysqli_error($koneksi);
            exit();
        }
    } else {
        // Redirect back to the lihat_kurikulum.php page if the ID is not provided
        header("Location: lihat_kurikulum.php");
        exit();
    }
}
?>
