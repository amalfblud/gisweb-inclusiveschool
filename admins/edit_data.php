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
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Sekolah</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                        </div>
                        <div class="card-body">

                        <?php
                        include '../koneksi.php';

                        $id = $_GET['id_sekolah'];

                        // Retrieve data from the 'sekolah' table
                        $query = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id_sekolah='$id'");
                        $data_sekolah = mysqli_fetch_array($query);

                        // Retrieve data from the 'profil' table
                        $query = mysqli_query($koneksi, "SELECT * FROM profil WHERE id_sekolah='$id'");
                        $data_profil = mysqli_fetch_array($query);

                        // Retrieve data from the 'rekap' table
                        $query = mysqli_query($koneksi, "SELECT * FROM rekap WHERE id_sekolah='$id'");
                        $data_rekap = mysqli_fetch_array($query);

                        // Retrieve data from the 'data_ptkpd' table
                        $query = mysqli_query($koneksi, "SELECT * FROM data_ptkpd WHERE id_rekap='$data_rekap[id_rekap]'");
                        $data_ptkpd = mysqli_fetch_array($query);

                        // Retrieve data from the 'kontak' table
                        $query = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id_sekolah='$id'");
                        $data_kontak = mysqli_fetch_array($query);

                        // Retrieve data from the 'gambar_sekolah' table
                        $query = mysqli_query($koneksi, "SELECT * FROM gambar_sekolah WHERE id_sekolah='$id'");
                        $gambar_sekolah = array();
                        while ($row = mysqli_fetch_assoc($query)) {
                            $gambar_sekolah[] = $row['gambar'];
                        }
                        ?>

                            <!-- </div> -->
                            <div class="panel-body">
                            <form class="form-horizontal style-form" style="margin-top: 20px;" action="edit_aksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                    <!-- Sekolah -->
                                    <h6 class="m-0 font-weight-bold text-primary">Data Singkat: </h6><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">ID Sekolah</label>
                                        <div class="col-sm-8">
                                            <input name="id_sekolah" type="text" id="id_sekolah" class="form-control" value="<?php echo $data_sekolah['id_sekolah']; ?>" readonly />
                                            <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama Sekolah : </label>
                                        <div class="col-sm-8">
                                            <input name="nama_sekolah" type="text" id="nama_sekolah" class="form-control" value="<?php echo $data_sekolah['nama_sekolah']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama Kepala Sekolah : </label>
                                        <div class="col-sm-8">
                                            <input name="nama_kepsek" type="text" id="nama_kepsek" class="form-control" value="<?php echo $data_sekolah['nama_kepsek']; ?>" required />
                                        </div>
                                    </div>                                   
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Akreditasi : </label>
                                        <div class="col-sm-8">
                                            <input name="akreditasi" class="form-control" type="text" id="akreditasi" type="text" value="<?php echo $data_sekolah['akreditasi']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Kebutuhan khusus yang dilayani : </label>
                                        <div class="col-sm-8">
                                            <input name="kebsus" class="form-control" type="text" id="kebsus" type="text" value="<?php echo $data_sekolah['kebsus']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Kurikulum : </label>
                                        <div class="col-sm-8">
                                            <input name="kurikulum" class="form-control" type="text" id="kurikulum" type="text" value="<?php echo $data_sekolah['kurikulum']; ?>" required />
                                        </div>
                                    </div>

                                    <!-- Profil -->
                                    <br><h6 class="m-0 font-weight-bold text-primary">Profil Sekolah: </h6><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Status : </label>
                                        <div class="col-sm-8">
                                            <input name="status" class="form-control" id="status" type="text" value="<?php echo $data_profil['status']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">NPSN : </label>
                                        <div class="col-sm-8">
                                            <input name="npsn" class="form-control" id="npsn" type="text" value="<?php echo $data_profil['npsn']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Bentuk Pendidikan : </label>
                                        <div class="col-sm-8">
                                            <input name="bentukpend" class="form-control" id="bentukpend" type="text" value="<?php echo $data_profil['bentukpend']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Status Kepemilikan : </label>
                                        <div class="col-sm-8">
                                            <input name="statuspem" class="form-control" id="statuspem" type="text" value="<?php echo $data_profil['statuspem']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tanggal Pendirian : </label>
                                        <div class="col-sm-8">
                                            <input name="tglpen" class="form-control" id="tglpen" type="date" value="<?php echo $data_profil['tglpen']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tanggal SK Pendirian : </label>
                                        <div class="col-sm-8">
                                            <input name="tglskpen" class="form-control" id="tglskpen" type="date" value="<?php echo $data_profil['tglskpen']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">SK Izin Operasional : </label>
                                        <div class="col-sm-8">
                                            <input name="skizin" class="form-control" id="skizin" type="text" value="<?php echo $data_profil['skizin']; ?>" required />
                                        </div>
                                    </div>

                                    <!-- Rekap -->
                                    <br><h6 class="m-0 font-weight-bold text-primary">Fasilitas Sekolah: </h6><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Pimpinan : </label>
                                        <div class="col-sm-8">
                                            <input name="r_pimpinan" class="form-control" id="r_pimpinan" type="text" value="<?php echo $data_rekap['r_pimpinan']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Guru : </label>
                                        <div class="col-sm-8">
                                            <input name="r_guru" class="form-control" id="r_guru" type="text" value="<?php echo $data_rekap['r_guru']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Kelas : </label>
                                        <div class="col-sm-8">
                                            <input name="r_kelas" class="form-control" id="r_kelas" type="text" value="<?php echo $data_rekap['r_kelas']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Perpustakaan : </label>
                                        <div class="col-sm-8">
                                            <input name="r_perpus" class="form-control" id="r_perpus" type="text" value="<?php echo $data_rekap['r_perpus']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Laboratorium : </label>
                                        <div class="col-sm-8">
                                            <input name="r_labo" class="form-control" id="r_labo" type="text" value="<?php echo $data_rekap['r_labo']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Praktik : </label>
                                        <div class="col-sm-8">
                                            <input name="r_prak" class="form-control" id="r_prak" type="text" value="<?php echo $data_rekap['r_prak']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Ibadah : </label>
                                        <div class="col-sm-8">
                                            <input name="r_ibadah" class="form-control" id="r_ibadah" type="text" value="<?php echo $data_rekap['r_ibadah']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang UKS : </label>
                                        <div class="col-sm-8">
                                            <input name="r_uks" class="form-control" id="r_uks" type="text" value="<?php echo $data_rekap['r_uks']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang TU : </label>
                                        <div class="col-sm-8">
                                            <input name="r_tu" class="form-control" id="r_tu" type="text" value="<?php echo $data_rekap['r_tu']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Konseling : </label>
                                        <div class="col-sm-8">
                                            <input name="r_bk" class="form-control" id="r_bk" type="text" value="<?php echo $data_rekap['r_bk']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang OSIS : </label>
                                        <div class="col-sm-8">
                                            <input name="r_osis" class="form-control" id="r_osis" type="text" value="<?php echo $data_rekap['r_osis']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Toilet : </label>
                                        <div class="col-sm-8">
                                            <input name="r_toilet" class="form-control" id="r_toilet" type="text" value="<?php echo $data_rekap['r_toilet']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Gudang : </label>
                                        <div class="col-sm-8">
                                            <input name="r_gudang" class="form-control" id="r_gudang" type="text" value="<?php echo $data_rekap['r_gudang']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Ruang Bermain / Olahraga : </label>
                                        <div class="col-sm-8">
                                            <input name="r_berolahraga" class="form-control" id="r_berolahraga" type="text" value="<?php echo $data_rekap['r_berolahraga']; ?>" required />
                                        </div>
                                    </div>

                                    <!-- Rekap2 -->
                                    <br><h6 class="m-0 font-weight-bold text-primary">Data PTK dan PD: </h6><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Guru Laki-Laki : </label>
                                        <div class="col-sm-8">
                                            <input name="guru_laki" class="form-control" id="guru_laki" type="text" value="<?php echo $data_ptkpd['guru_laki']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Guru Perempuan : </label>
                                        <div class="col-sm-8">
                                            <input name="guru_perem" class="form-control" id="guru_perem" type="text" value="<?php echo $data_ptkpd['guru_perem']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tendik Laki-Laki : </label>
                                        <div class="col-sm-8">
                                            <input name="tendik_laki" class="form-control" id="tendik_laki" type="text" value="<?php echo $data_ptkpd['tendik_laki']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tendik Perempuan : </label>
                                        <div class="col-sm-8">
                                            <input name="tendik_perem" class="form-control" id="tendik_perem" type="text" value="<?php echo $data_ptkpd['tendik_perem']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Siswa : </label>
                                        <div class="col-sm-8">
                                            <input name="pd_laki" class="form-control" id="pd_laki" type="text" value="<?php echo $data_ptkpd['pd_laki']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Siswi : </label>
                                        <div class="col-sm-8">
                                            <input name="pd_perem" class="form-control" id="pd_perem" type="text" value="<?php echo $data_ptkpd['pd_perem']; ?>" required />
                                        </div>
                                    </div>
                                    
                                    <!-- Kontak -->
                                    <br><h6 class="m-0 font-weight-bold text-primary">Kontak Sekolah: </h6><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Alamat : </label>
                                        <div class="col-sm-8">
                                            <input name="alamat" class="form-control" id="alamat" type="text" value="<?php echo $data_kontak['alamat']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">RT / RW : </label>
                                        <div class="col-sm-8">
                                            <input name="rtrw" class="form-control" id="rtrw" type="text" value="<?php echo $data_kontak['rtrw']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Kelurahan : </label>
                                        <div class="col-sm-8">
                                            <input name="kelurahan" class="form-control" id="kelurahan" type="text" value="<?php echo $data_kontak['kelurahan']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Kecamatan : </label>
                                        <div class="col-sm-8">
                                            <input name="kecamatan" class="form-control" id="kecamatan" type="text" value="<?php echo $data_kontak['kecamatan']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Kabupaten : </label>
                                        <div class="col-sm-8">
                                            <input name="kabupaten" class="form-control" id="kabupaten" type="text" value="<?php echo $data_kontak['kabupaten']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Provinsi : </label>
                                        <div class="col-sm-8">
                                            <input name="provinsi" class="form-control" id="provinsi" type="text" value="<?php echo $data_kontak['provinsi']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Kode Pos : </label>
                                        <div class="col-sm-8">
                                            <input name="kode_pos" class="form-control" id="kode_pos" type="text" value="<?php echo $data_kontak['kode_pos']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nomer Telpon : </label>
                                        <div class="col-sm-8">
                                            <input name="notelp" class="form-control" id="notelp" type="text" value="<?php echo $data_kontak['notelp']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nomer Faks : </label>
                                        <div class="col-sm-8">
                                            <input name="nofaks" class="form-control" id="nofaks" type="text" value="<?php echo $data_kontak['nofaks']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Email : </label>
                                        <div class="col-sm-8">
                                            <input name="email" class="form-control" id="email" type="text" value="<?php echo $data_kontak['email']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Situs : </label>
                                        <div class="col-sm-8">
                                            <input name="situs" class="form-control" id="situs" type="text" value="<?php echo $data_kontak['situs']; ?>" required />
                                        </div>
                                    </div>
                                    

                                    <!-- Sekolah -->
                                    <br><h6 class="m-0 font-weight-bold text-primary">Lokasi Sekolah: </h6><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Latitude : </label>
                                        <div class="col-sm-8">
                                            <input name="latitude" class="form-control" id="latitude" type="text" value="<?php echo $data_sekolah['latitude']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Longitude : </label>
                                        <div class="col-sm-8">
                                            <input name="longitude" class="form-control" id="longitude" type="text" value="<?php echo $data_sekolah['longitude']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-4 control-label">Foto Sekolah : </label>
                                        <div class="col-sm-6">
                                            <input name="gambar[]" id="gambar-input" class="form-control-file" type="file" accept="image/*" multiple />
                                        </div>
                                    </div>
                                    <!-- Alt text input fields -->
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-4 control-label">Alt Text: </label>
                                        <div class="col-sm-6">
                                            <input name="alt_text[]" class="form-control" type="text" placeholder="Alternative text untuk gambar" />
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-sm-8">
                                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                            <a href="javascript:history.back()" class="btn btn-sm btn-secondary">Kembali</a>
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px;"></div>
                                </form>
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