<?php
session_start();
include "header.php";
include "koneksi.php";

if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit;
}
?>

<!DOCTYPE html>
<html>

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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Sekolah Inklusi Dan Sekolah Luar Biasa Kota Balikpapan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sekolah</th>
                                            <th>NPSN</th>
                                            <th>Kebutuhan Khusus</th>
                                            <th>Kurikulum</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        $data = mysqli_query($koneksi, "SELECT s.*, p.npsn, k.alamat FROM sekolah s
                                            JOIN profil p ON s.id_sekolah = p.id_sekolah
                                            JOIN kontak k ON s.id_sekolah = k.id_sekolah");
                                        if ($data) {
                                            while ($d = mysqli_fetch_assoc($data)) {
                                                $no++;
                                        ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><b><a href="detail_data.php?id_sekolah=<?php echo $d['id_sekolah']; ?> "> <?php echo $d['nama_sekolah']; ?> </a> </b></td>
                                                    <td><?php echo $d['npsn']; ?></td>
                                                    <td><?php echo $d['kebsus']; ?></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="lihat_kurikulum.php?id_sekolah=<?php echo $d['id_sekolah']; ?>" class="btn btn-primary btn-sm ms-2">Lihat Kurikulum</a>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $d['alamat']; ?></td>
                                                    <td>
                                                        <a href="edit_data.php?id_sekolah=<?php echo $d['id_sekolah']; ?> " class="btn-sm btn-primary"><span class="fas fa-edit"></span></a>
                                                        <a href="hapus_aksi.php?id_sekolah=<?php echo $d['id_sekolah']; ?>" class="btn-sm btn-danger"><span class="fas fa-trash"></span></a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "Error: " . mysqli_error($koneksi);
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
