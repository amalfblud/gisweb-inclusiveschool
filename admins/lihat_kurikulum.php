<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../koneksi.php";

    // ganti nama
    $class_mapping = array(
        'year1' => 'Kelas 1',
        'year2' => 'Kelas 2',
        'year3' => 'Kelas 3',
        'year4' => 'Kelas 4',
        'year5' => 'Kelas 5',
        'year6' => 'Kelas 6',
    );

    // Check if the id_sekolah parameter is provided in the URL
    $id = isset($_GET['id_sekolah']) ? $_GET['id_sekolah'] : null;
    if ($id !== null) {
        $query = mysqli_query($koneksi, "select * from sekolah where id_sekolah='$id'");
        $data  = mysqli_fetch_array($query);
    } else {
        // If id_sekolah is not provided, show an error message
        echo "Error: No school ID provided.";
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Kurikulum Sekolah : <?php echo $data['nama_sekolah']; ?></h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Kurikulum Sekolah : </h6>
                        </div>
                        <div class="card-body">
                            <!-- Display sekolah details -->
                            <table id="detailsekolah" class="table table-hover table-bordered">
                                <tr>
                                    <td width="250">Nama Sekolah</td>
                                    <td width="550"><?php echo $data['nama_sekolah']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kebutuhan Khusus yang dilayani</td>
                                    <td><?php echo $data['kebsus']; ?></td>
                                </tr>
                            </table>

                            <!-- Display kurikulum data -->
                            <h3>Data Kurikulum</h3>
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="10%">
                                            Tingkat
                                            <button class="btn btn-link btn-sm" onclick="toggleSorting()">
                                                <i id="sortingIcon" class="fas fa-sort"></i>
                                            </button>
                                        </th>
                                        <th width="25%">Mata Pelajaran</th>
                                        <th width="50%">Keterangan</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Check if the sorting parameter is provided in the URL
                                    $order = isset($_GET['order']) && ($_GET['order'] === 'asc' || $_GET['order'] === 'desc') ? $_GET['order'] : 'asc';
                                    $orderIconClass = $order === 'asc' ? 'fa-sort-asc' : 'fa-sort-desc';

                                    // Fetch kurikulum data for the selected sekolah with optional sorting
                                    $query_kurikulum = mysqli_query($koneksi, "SELECT * FROM kurikulum WHERE id_sekolah='$id' ORDER BY school_year $order");
                                    $no = 1;
                                    while ($data_kurikulum = mysqli_fetch_array($query_kurikulum)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo isset($class_mapping[$data_kurikulum['school_year']]) ? $class_mapping[$data_kurikulum['school_year']] : $data_kurikulum['school_year']; ?></td>
                                            <td><?php echo $data_kurikulum['subject_name']; ?></td>
                                            <td><?php echo $data_kurikulum['keterangan']; ?></td>
                                            <td>
                                                <a href="edit_kurikulum.php?id=<?php echo $data_kurikulum['id_kurikulum']; ?>&id_sekolah=<?php echo $data['id_sekolah']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="delete_kurikulum.php?id=<?php echo $data_kurikulum['id_kurikulum']; ?>&id_sekolah=<?php echo $data['id_sekolah']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>

                            <!-- Buttons to navigate -->
                            <div class="col-sm-8 mt-3">
                                <div class="btn-group">
                                    <a href="tambah_kurikulum.php?id_sekolah=<?php echo $_GET['id_sekolah']; ?>" class="btn btn-primary btn-sm ms-2" aria-label="Tambah Kurikulum">Tambah Kurikulum</a>
                                    <a href="tampil_data.php" class="btn btn-secondary btn-sm ms-2" aria-label="Kembali">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>

<?php
}
?>

<script>
    // Function to toggle between ascending and descending sorting
    function toggleSorting() {
        var sortingIcon = document.getElementById("sortingIcon");
        var currentOrder = "<?php echo $order; ?>";

        // Toggle the sorting order
        var newOrder = currentOrder === 'asc' ? 'desc' : 'asc';

        // Update the sorting icon based on the new order
        if (newOrder === 'asc') {
            sortingIcon.classList.remove('fa-sort-desc');
            sortingIcon.classList.add('fa-sort-asc');
        } else {
            sortingIcon.classList.remove('fa-sort-asc');
            sortingIcon.classList.add('fa-sort-desc');
        }

        // Redirect to the same page with the updated sorting parameter
        var currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('order', newOrder);
        window.location.href = currentUrl.toString();
    }
</script>
