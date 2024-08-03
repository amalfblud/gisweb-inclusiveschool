<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../koneksi.php";

    // Check if the ID and id_sekolah are provided in the URL
    if (isset($_GET['id']) && isset($_GET['id_sekolah'])) {
        // Sanitize the ID and id_sekolah to prevent SQL injection
        $id = mysqli_real_escape_string($koneksi, $_GET['id']);
        $id_sekolah = mysqli_real_escape_string($koneksi, $_GET['id_sekolah']);

        // Fetch the kurikulum data based on the ID
        $query = mysqli_query($koneksi, "SELECT * FROM kurikulum WHERE id_kurikulum='$id'");
        $data = mysqli_fetch_array($query);

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the form data
            $subject_name = mysqli_real_escape_string($koneksi, $_POST['subject_name']);
            $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

            // Perform the update query
            $update_query = mysqli_query($koneksi, "UPDATE kurikulum SET subject_name='$subject_name', keterangan='$keterangan' WHERE id_kurikulum='$id'");

            // Check if the update operation was successful
            if ($update_query) {
                // Redirect back to lihat_kurikulum.php with a success message
                header("Location: lihat_kurikulum.php?id_sekolah=$id_sekolah");
                exit();
            } else {
                // If there's an error, print the error message
                echo "Error: " . mysqli_error($koneksi);
            }
        }
    } else {
        // Redirect back to lihat_kurikulum.php if the ID or id_sekolah is not provided
        header("Location: lihat_kurikulum.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php"; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "menu_topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Kurikulum</h1>

                    <!-- Form to edit kurikulum details -->
                    <form action="" method="post">
                        <!-- Display the existing school year value as a read-only field -->
                        <div class="form-group">
                            <label for="school_year">School Year:</label>
                            <input type="text" class="form-control" id="school_year" name="school_year" value="<?php echo $data['school_year']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="subject_name">Subject Name:</label>
                            <input type="text" class="form-control" id="subject_name" name="subject_name" value="<?php echo $data['subject_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required><?php echo $data['keterangan']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="lihat_kurikulum.php?id_sekolah=<?php echo $id_sekolah; ?>" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
                <!-- End of Main Content -->
                <?php include "footer.php"; ?>
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    </div>
    <!-- End of Wrapper -->
</body>

</html>

<?php
}
?>
