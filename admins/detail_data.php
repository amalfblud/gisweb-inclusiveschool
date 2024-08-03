<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../koneksi.php";

    // Check if the id_sekolah parameter is provided in the URL
    if (isset($_GET['id_sekolah'])) {
        $id = $_GET['id_sekolah'];

        // Fetch sekolah data from the sekolah table
        $query_sekolah = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id_sekolah='$id'");
        $data_sekolah = mysqli_fetch_array($query_sekolah);

        // Fetch profil data from the profil table
        $query_profil = mysqli_query($koneksi, "SELECT * FROM profil WHERE id_sekolah='$id'");
        $data_profil = mysqli_fetch_array($query_profil);

        // Fetch kontak data from the kontak table
        $query_kontak = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id_sekolah='$id'");
        $data_kontak = mysqli_fetch_array($query_kontak);

        // Fetch rekap data from the rekap table
        $query_rekap = mysqli_query($koneksi, "SELECT * FROM rekap WHERE id_sekolah='$id'");
        $data_rekap = mysqli_fetch_array($query_rekap);

        // Check if the rekap data is fetched successfully before proceeding with the join query
        if ($data_rekap) {
        // Fetch data from the data_ptkpd table by joining with rekap table
        $query_ptkpd = mysqli_query($koneksi, "SELECT * FROM data_ptkpd WHERE id_rekap='$data_rekap[id_rekap]'");
        $data_ptkpd = mysqli_fetch_array($query_ptkpd);
        
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
                            <h1 class="h3 mb-0 text-gray-800">Detail Sekolah <?php echo $data_sekolah['nama_sekolah']; ?></h1>
                        </div>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="panel-body">
                                    <!-- Sekolah -->
                                    <table id="example" class="table table-hover table-bordered">
                                        <h6 class="m-0 font-weight-bold text-primary">Informasi sekolah : </h6>
                                        <tr>
                                            <td width="250">Nama Sekolah</td>
                                            <td width="550"><?php echo $data_sekolah['nama_sekolah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Kepala Sekolah</td>
                                            <td><?php echo $data_sekolah['nama_kepsek']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Akreditasi</td>
                                            <td><?php echo $data_sekolah['akreditasi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kebutuhan Khusus yang dilayani</td>
                                            <td><?php echo $data_sekolah['kebsus']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kurikulum</td>
                                            <td><?php echo $data_sekolah['kurikulum']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td><?php echo $data_sekolah['latitude']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Longitude</td>
                                            <td><?php echo $data_sekolah['longitude']; ?></td>
                                        </tr>
                                    </table>

                                    <!-- Profil -->
                                    <table id="example" class="table table-hover table-bordered">
                                        <h6 class="m-0 font-weight-bold text-primary">Profil : </h6>
                                        <tr>
                                            <td width="250">Status</td>
                                            <td width="550"><?php echo $data_profil['status']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>NPSN</td>
                                            <td><?php echo $data_profil['npsn']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bentuk Pendidikan</td>
                                            <td><?php echo $data_profil['bentukpend']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Kepemilikan</td>
                                            <td><?php echo $data_profil['statuspem']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pendirian</td>
                                            <td><?php echo $data_profil['tglpen']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal SK Pendirian</td>
                                            <td><?php echo $data_profil['tglskpen']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>SK Izin Operasional</td>
                                            <td><?php echo $data_profil['skizin']; ?></td>
                                        </tr>
                                    </table>

                                    <!-- Rekap -->
                                    <table id="example" class="table table-hover table-bordered">
                                        <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi : </h6>
                                        <tr>
                                            <td width="250">Ruang Pimpinan</td>
                                            <td width="550"><?php echo $data_rekap['r_pimpinan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang Guru</td>
                                            <td><?php echo $data_rekap['r_guru']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang Kelas</td>
                                            <td><?php echo $data_rekap['r_kelas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang Perpustakaan</td>
                                            <td><?php echo $data_rekap['r_perpus']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang Laboratorium</td>
                                            <td><?php echo $data_rekap['r_labo']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang Praktik</td>
                                            <td><?php echo $data_rekap['r_prak']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang Ibadah</td>
                                            <td><?php echo $data_rekap['r_ibadah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang UKS</td>
                                            <td><?php echo $data_rekap['r_uks']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang TU</td>
                                            <td><?php echo $data_rekap['r_tu']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang Konseling</td>
                                            <td><?php echo $data_rekap['r_bk']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang OSIS</td>
                                            <td><?php echo $data_rekap['r_osis']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang Toilet</td>
                                            <td><?php echo $data_rekap['r_toilet']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ruang Gudang</td>
                                            <td><?php echo $data_rekap['r_gudang']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Bermain / Olahraga</td>
                                            <td><?php echo $data_rekap['r_berolahraga']; ?></td>
                                        </tr>
                                    </table>

                                    <!-- PTKPD -->
                                    <table id="example" class="table table-hover table-bordered">
                                        <h6 class="m-0 font-weight-bold text-primary">Data PTK dan PD : </h6>
                                        <tr>
                                            <td width="250">Guru Laki-Laki</td>
                                            <td width="550"><?php echo $data_ptkpd['guru_laki']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Guru Perempuan</td>
                                            <td><?php echo $data_ptkpd['guru_perem']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tendik Laki-Laki</td>
                                            <td><?php echo $data_ptkpd['tendik_laki']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tendik Perempuan</td>
                                            <td><?php echo $data_ptkpd['tendik_perem']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Peserta Didik Laki-Laki (Siswa)</td>
                                            <td><?php echo $data_ptkpd['pd_laki']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Peserta Didik Perempuan (Siswi)</td>
                                            <td><?php echo $data_ptkpd['pd_perem']; ?></td>
                                        </tr>
                                    </table>
                                    <?php
                                    }
                                    ?>

                                    <!-- Kontak -->
                                    <table id="example" class="table table-hover table-bordered">
                                        <h6 class="m-0 font-weight-bold text-primary">Kontak : </h6>
                                        <tr>
                                            <td width="250">Alamat</td>
                                            <td width="550"><?php echo $data_kontak['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>RT /RW</td>
                                            <td><?php echo $data_kontak['rtrw']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelurahan</td>
                                            <td><?php echo $data_kontak['kelurahan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td><?php echo $data_kontak['kecamatan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten</td>
                                            <td><?php echo $data_kontak['kabupaten']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td><?php echo $data_kontak['provinsi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kode Pos</td>
                                            <td><?php echo $data_kontak['kode_pos']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomer Telpon</td>
                                            <td><?php echo $data_kontak['notelp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomer Faks</td>
                                            <td><?php echo $data_kontak['nofaks']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><a href="mailto:<?php echo $data_kontak['email']; ?>"><?php echo $data_kontak['email']; ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>Situs</td>
                                            <td><a href="<?php echo $data_kontak['situs']; ?>"><?php echo $data_kontak['situs']; ?></a></td>
                                        </tr>
                                    </table>
                                    <div class="col-sm-8">
                                        <a href="javascript:history.back()" class="btn btn-sm btn-success">Kembali</a>
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
