<?php include "header.php"; ?>

<!-- ======= Hero Section ======= -->
    <section id="hero2" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <h1>Sekolah Inklusi dan Sekolah Luar Biasa</h1>
            <h2>Tempat Pencarian Sekolah Inklusi dan Sekolah Luar Biasa di Kota Balikpapan</h2>
        </div>
    </section>
<!-- End Hero -->

<!-- Start about-info Area -->
    <section class="about-info-area section-gap">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-lg-30 into-right" data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-12">
            <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">

            </div>
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-admin">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="30%">Nama Sekolah</th>
                        <th width="30%">Alamat</th>
                        <th width="20%">Kebutuhan khusus yang dilayani</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                $query = "SELECT s.id_sekolah, s.nama_sekolah, k.alamat, s.kebsus FROM sekolah s
                    JOIN kontak k ON s.id_sekolah = k.id_sekolah";
                $result = mysqli_query($koneksi, $query);

                $no = 1;
                if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nama_sekolah']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><a href="kodekebsus.php"><?php echo $row['kebsus']; ?></a></td>
                    <td class="ctr">
                        <div class="btn-group">
                            <a href="detailsekolah.php?id_sekolah=<?php echo $row['id_sekolah']; ?>" rel="tooltip" data-original-title="Lihat File" data-placement="top" class="btn btn-primary">
                                <i class="fa fa-map-marker"></i> Detail dan Lokasi
                            </a>
                        </div>
                    </td>
                </tr>
                <?php
                $no++;
                }
                } else {
                    echo "Data tidak ada.";
                }
                ?>
                </tbody>
            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End about-info Area -->

<?php include "footer.php"; ?>