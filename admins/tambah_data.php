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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Sekolah</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                        </div>
                        <div class="card-body">

                            <!-- Main content -->
                            <form class="form-horizontal style-form" style="margin-top: 10px;" action="tambah_aksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <!-- Sekolah -->
                                <h6 class="m-0 font-weight-bold text-primary">Data Singkat: </h6><br>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Sekolah : </label>
                                    <div class="col-sm-6">
                                        <input name="nama_sekolah" type="text" class="form-control" placeholder="Masukkan Nama Sekolah" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Nama Kepala Sekolah : </label>
                                    <div class="col-sm-6">
                                        <input name="nama_kepsek" class="form-control" type="text" placeholder="Masukkan Nama Kepala Sekolah" required />
                                    </div>
                                </div>                             
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Akreditasi : </label>
                                    <div class="col-sm-6">
                                        <input name="akreditasi" class="form-control" type="text" placeholder="Masukkan Akreditasi" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Kebutuhan khusus yang dilayani : </label>
                                    <div class="col-sm-6">
                                        <input name="kebsus" class="form-control" type="text" placeholder="Masukkan Kebutuhan Khusus" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Kurikulum : </label>
                                    <div class="col-sm-6">
                                        <input name="kurikulum" class="form-control" type="text" placeholder="Masukkan Kurikulum" required />
                                    </div>
                                </div>

                                <!-- Profil -->
                                <br><h6 class="m-0 font-weight-bold text-primary">Profil Sekolah: </h6><br>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Status : </label>
                                    <div class="col-sm-6">
                                        <input name="status" type="text" class="form-control" placeholder="Masukkan Status" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">NPSN : </label>
                                    <div class="col-sm-6">
                                        <input name="npsn" type="text" class="form-control" placeholder="Masukkan NPSN" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Bentuk Pendidikan : </label>
                                    <div class="col-sm-6">
                                        <input name="bentukpend" class="form-control" type="text" placeholder="Masukkan Bentuk Pendidikan" required />
                                    </div>
                                </div>                             
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Status Kepemilikan : </label>
                                    <div class="col-sm-6">
                                        <input name="statuspem" class="form-control" type="text" placeholder="Masukkan Status Kepemilikan" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Tanggal Pendirian : </label>
                                    <div class="col-sm-6">
                                        <input name="tglpen" class="form-control" type="date" placeholder="Masukkan Tanggal Pendirian" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Tanggal SK Pendirian : </label>
                                    <div class="col-sm-6">
                                        <input name="tglskpen" class="form-control" type="date" placeholder="Masukkan Tanggal SK Pendirian" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">SK Izin Operasional : </label>
                                    <div class="col-sm-6">
                                        <input name="skizin" class="form-control" type="text" placeholder="Masukkan SK Izin Operasional" required />
                                    </div>
                                </div>

                                <!-- Rekap -->
                                <br><h6 class="m-0 font-weight-bold text-primary">Fasilitas Sekolah: </h6><br>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Pimpinan : </label>
                                    <div class="col-sm-6">
                                        <input name="r_pimpinan" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang Pimpinan" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Guru : </label>
                                    <div class="col-sm-6">
                                        <input name="r_guru" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang Guru" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Kelas : </label>
                                    <div class="col-sm-6">
                                        <input name="r_kelas" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang Kelas" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Perpustakaan : </label>
                                    <div class="col-sm-6">
                                        <input name="r_perpus" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang Perpustakaan" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Laboratorium : </label>
                                    <div class="col-sm-6">
                                        <input name="r_labo" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang Laboratorium" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Praktik : </label>
                                    <div class="col-sm-6">
                                        <input name="r_prak" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang Praktik" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Ibadah : </label>
                                    <div class="col-sm-6">
                                        <input name="r_ibadah" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang Ibadah" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang UKS : </label>
                                    <div class="col-sm-6">
                                        <input name="r_uks" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang UKS" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang TU : </label>
                                    <div class="col-sm-6">
                                        <input name="r_tu" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang TU" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Konseling : </label>
                                    <div class="col-sm-6">
                                        <input name="r_bk" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang Konseling" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang OSIS : </label>
                                    <div class="col-sm-6">
                                        <input name="r_osis" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang OSIS" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Toilet : </label>
                                    <div class="col-sm-6">
                                        <input name="r_toilet" type="text" class="form-control" placeholder="Masukkan Jumlah Toilet" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Gudang : </label>
                                    <div class="col-sm-6">
                                        <input name="r_gudang" type="text" class="form-control" placeholder="Masukkan Jumlah Gudang" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ruang Bermain / Olahraga : </label>
                                    <div class="col-sm-6">
                                        <input name="r_berolahraga" type="text" class="form-control" placeholder="Masukkan Jumlah Ruang Bermain / Olahraga" required />
                                    </div>
                                </div>

                                <!-- Rekap 2 -->
                                <br><h6 class="m-0 font-weight-bold text-primary">Data PTK dan PD: </h6><br>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Guru Laki-Laki : </label>
                                    <div class="col-sm-6">
                                        <input name="guru_laki" type="text" class="form-control" placeholder="Masukkan Jumlah Guru Laki-Laki" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Guru Perempuan : </label>
                                    <div class="col-sm-6">
                                        <input name="guru_perem" type="text" class="form-control" placeholder="Masukkan Jumlah Guru Perempuan" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tendik Laki-Laki : </label>
                                    <div class="col-sm-6">
                                        <input name="tendik_laki" type="text" class="form-control" placeholder="Masukkan Jumlah Tendik Laki-Laki" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tendik Perempuan : </label>
                                    <div class="col-sm-6">
                                        <input name="tendik_perem" type="text" class="form-control" placeholder="Masukkan Jumlah Tendik Laki-Laki" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Siswa : </label>
                                    <div class="col-sm-6">
                                        <input name="pd_laki" type="text" class="form-control" placeholder="Masukkan Jumlah Siswa" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Siswi : </label>
                                    <div class="col-sm-6">
                                        <input name="pd_perem" type="text" class="form-control" placeholder="Masukkan Jumlah Siswi" required />
                                    </div>
                                </div>
                                

                                <!-- Kontak -->
                                <br><h6 class="m-0 font-weight-bold text-primary">Kontak Sekolah: </h6><br>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Alamat : </label>
                                    <div class="col-sm-6">
                                        <input name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">RT / RW : </label>
                                    <div class="col-sm-6">
                                        <input name="rtrw" type="text" class="form-control" placeholder="Masukkan RT / RW" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Kelurahan : </label>
                                    <div class="col-sm-6">
                                        <input name="kelurahan" class="form-control" type="text" placeholder="Masukkan Kelurahan" required />
                                    </div>
                                </div>                             
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Kecamatan : </label>
                                    <div class="col-sm-6">
                                        <input name="kecamatan" class="form-control" type="text" placeholder="Masukkan Kecamatan" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Kabupaten : </label>
                                    <div class="col-sm-6">
                                        <input name="kabupaten" class="form-control" type="text" placeholder="Masukkan Kabupaten" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Provinsi : </label>
                                    <div class="col-sm-6">
                                        <input name="provinsi" class="form-control" type="text" placeholder="Masukkan Provinsi" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Kode Pos : </label>
                                    <div class="col-sm-6">
                                        <input name="kode_pos" class="form-control" type="text" placeholder="Masukkan Kode Pos" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Nomer Telpon : </label>
                                    <div class="col-sm-6">
                                        <input name="notelp" class="form-control" type="text" placeholder="Masukkan Nomer Telpon" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Nomer Faks : </label>
                                    <div class="col-sm-6">
                                        <input name="nofaks" class="form-control" type="text" placeholder="Masukkan Nomer Faks" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Email : </label>
                                    <div class="col-sm-6">
                                        <input name="email" class="form-control" type="text" placeholder="Masukkan Email" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Situs : </label>
                                    <div class="col-sm-6">
                                        <input name="situs" class="form-control" type="text" placeholder="Masukkan Situs" required />
                                    </div>
                                </div>

                                <!-- Sekolah -->
                                <br><h6 class="m-0 font-weight-bold text-primary">Lokasi Sekolah: </h6><br>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Latitude : </label>
                                    <div class="col-sm-6">
                                        <input name="latitude" class="form-control" type="text" placeholder="-1.2348748" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Longitude : </label>
                                    <div class="col-sm-6">
                                        <input name="longitude" class="form-control" type="text" placeholder="116.8546397" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Foto Sekolah: </label>
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
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                                    </div>
                                </div>
                                <div style="margin-top: 20px;"></div>
                            </form>
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
