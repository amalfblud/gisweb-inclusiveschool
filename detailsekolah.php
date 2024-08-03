<?php
include "header.php";
include "koneksi.php";
include "fetch_data.php";

$id = $_GET['id_sekolah'];

// Call the fetchData function and pass the $koneksi variable
$data = fetchData($koneksi, $id);

$id_sekolah = "";
$nama_sekolah = "";
$nama_kepsek = "";
$akreditasi = "";
$kebsus = "";
$kurikulum = "";
$latitude = "";
$longitude = "";

foreach ($data as $key => $value) {
    ${$key} = $value;
}

$title = "Detail dan Lokasi: " . $nama_sekolah;
?>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap"></script>

<script>
  function initialize() {
    var myLatlng = new google.maps.LatLng(<?php echo $latitude ?>, <?php echo $longitude ?>);
    var mapOptions = {
      zoom: 13,
      center: myLatlng
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var contentString =
      '<div id="content">' +
      '<div id="siteNotice">' +
      '</div>' +
      '<h1 id="firstHeading" class="firstHeading"><?php echo $nama_sekolah ?></h1>' +
      '<div id="bodyContent">' +
      '<p><?php echo $alamat ?></p>' +
      '</div>' +
      '</div>';

    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });

    // Create a marker and set its position
    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: '<?php echo $nama_sekolah ?>'
    });

    // Add a click event listener to open the infowindow
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2><?php echo $nama_sekolah ?></h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li><a href="pencariansekolah.php">Pencarian Sekolah</a></li>
        <li><?php echo $nama_sekolah ?></li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6">
        <div class="portfolio-details-slider swiper">
        <div class="swiper-wrapper align-items-center" id="uploaded-images">
          <?php
          $imagesQuery = mysqli_query($koneksi, "SELECT gambar, alt_text FROM gambar_sekolah WHERE id_sekolah = '$id_sekolah'");
          if (!$imagesQuery) {
            // Handle the query error
             "Error: " . mysqli_error($koneksi);
          } else {
            while ($imageRow = mysqli_fetch_assoc($imagesQuery)) {
              $imagePath = $imageRow['gambar'];
              $altText = $imageRow['alt_text'];
              $imageFullPath = str_replace("./", "", $imagePath); // Remove the leading './' from the image path
          ?>
              <div class="swiper-slide">
                <img src="/BB/admins/<?php echo $imageFullPath; ?>" alt="<?php echo $altText; ?>">
              </div>
          <?php
            }
          }
          ?>
        </div>
        <div class="swiper-pagination"></div>
        </div>
      </div>

      <div class="col-lg-6 text-center" id="informasi-sekolah">
        <h3>Informasi Sekolah:</h3>
        <ul class="list-group information-list">
          <li class="list-group-item d-flex justify-content-start">
            <span class="label">Nama Sekolah:</span>
            <span class="value"><?php echo $nama_sekolah; ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-start">
            <span class="label">Nama Kepala Sekolah:</span>
            <span class="value"><?php echo $nama_kepsek; ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-start">
            <span class="label">Akreditasi:</span>
            <span class="value"><?php echo $akreditasi; ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-start">
            <span class="label">Kebutuhan Khusus Dilayani:</span>
            <span class="value"><?php echo $kebsus; ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-start">
            <span class="label">Kurikulum:</span>
            <span class="value"><?php echo $kurikulum; ?></span>
          </li>
        </ul>
      </div>

      <div class="col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab" aria-controls="profil" aria-selected="true">Profil</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="rekap-tab" data-bs-toggle="tab" data-bs-target="#rekap" type="button" role="tab" aria-controls="rekap" aria-selected="false">Rekapitulasi</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="kontak-tab" data-bs-toggle="tab" data-bs-target="#kontak" type="button" role="tab" aria-controls="kontak" aria-selected="false">Kontak</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="kurikulum-tab" data-bs-toggle="tab" data-bs-target="#kurikulum" type="button" role="tab" aria-controls="kurikulum" aria-selected="false">Kurikulum</button>
          </li>
        </ul>

        <!-- Profil -->
        <div class="tab-content">
          <div class="tab-pane active" id="profil" role="tabpanel" aria-labelledby="profil-tab" tabindex="0">
            <h3>Identitas Sekolah:</h3>
            <ul>
              <li><strong>Nama</strong>: <?php echo $nama_sekolah ?></li>
              <li><strong>Status</strong>: <?php echo $status ?></li>
              <li><strong>NPSN</strong>: <?php echo $npsn ?></li>
              <li><strong>Bentuk Pendidikan</strong>: <?php echo $bentukpend ?></li>
              <li><strong>Status Kepemilikan</strong>: <?php echo $statuspem ?></li>
              <li><strong>Tanggal Pendirian</strong>: <?php echo $tglpen ?></li>
              <li><strong>Tanggal SK Pendirian</strong>: <?php echo $tglskpen ?></li>
              <li><strong>SK Izin Operasional</strong>: <?php echo $skizin ?></li>
            </ul>
            <h3>Data Pelengkap:</h3>
            <ul>
              <li><strong>Akreditasi</strong>: <?php echo $akreditasi ?></li>
              <li><strong>Kebutuhan Khusus yang Dilayani</strong>: <?php echo $kebsus ?></li>
              <li><strong>Kurikulum</strong>: <?php echo $kurikulum ?></li>
            </ul>
          </div>

          <!-- Rekap -->
          <div class="tab-pane" id="rekap" role="tabpanel" aria-labelledby="rekap-tab" tabindex="0">
            <h3>Fasilitas:</h3>
            <ul>
              <li><strong>Ruang Pimpinan</strong>: <?php echo $r_pimpinan ?></li>
              <li><strong>Ruang Guru</strong>: <?php echo $r_guru ?></li>
              <li><strong>Ruang Kelas</strong>: <?php echo $r_kelas ?></li>
              <li><strong>Ruang Perpustakaan</strong>: <?php echo $r_perpus ?></li>
              <li><strong>Ruang Laboratorium</strong>: <?php echo $r_labo ?></li>
              <li><strong>Ruang Praktik</strong>: <?php echo $r_prak ?></li>
              <li><strong>Ruang Ibadah</strong>: <?php echo $r_ibadah ?></li>
              <li><strong>Ruang UKS</strong>: <?php echo $r_uks ?></li>
              <li><strong>Ruang TU</strong>: <?php echo $r_tu ?></li>
              <li><strong>Ruang Konseling</strong>: <?php echo $r_bk ?></li>
              <li><strong>Ruang OSIS</strong>: <?php echo $r_osis ?></li>
              <li><strong>Ruang Toilet</strong>: <?php echo $r_toilet ?></li>
              <li><strong>Ruang Gudang</strong>: <?php echo $r_gudang ?></li>
              <li><strong>Tempat Bermain / Olahraga</strong>: <?php echo $r_berolahraga ?></li>
            </ul>
            <h3>Data PTK dan PD:</h3>
            <div class="table-responsive">
            <table class="data-table">
              <thead>
                <tr>
                  <th>Uraian</th>
                  <th>Guru</th>
                  <th>Tendik</th>
                  <th>PTK</th>
                  <th>PD</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Laki-Laki</td>
                  <td><?php echo $guru_laki ?></td>
                  <td><?php echo $tendik_laki ?></td>
                  <td><?php echo $guru_laki + $tendik_laki ?></td>
                  <td><?php echo $pd_laki ?></td>
                </tr>
                <tr>
                  <td>Perempuan</td>
                  <td><?php echo $guru_perem ?></td>
                  <td><?php echo $tendik_perem ?></td>
                  <td><?php echo $guru_perem + $tendik_perem ?></td>
                  <td><?php echo $pd_perem ?></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td class="bold">Total</td>
                  <td class="bold"><?php echo $guru_laki + $guru_perem ?></td>
                  <td class="bold"><?php echo $tendik_laki + $tendik_perem ?></td>
                  <td class="bold"><?php echo ($guru_laki + $guru_perem) + ($tendik_laki + $tendik_perem) ?></td>
                  <td class="bold"><?php echo $pd_laki + $pd_perem ?></td>
                </tr>
              </tfoot>
            </table>
            </div>
            <p class="keterangan">Keterangan:</p>
            <ul>
              <li><p class="keterangan">1. PTK = Guru ditambah Tendik</p></li>
              <li><p class="keterangan">2. PD = Peserta Didik</p></li>
            </li>
          </div>

          <!-- Kontak -->
          <div class="tab-pane" id="kontak" role="tabpanel" aria-labelledby="kontak-tab" tabindex="0">
            <h3>Alamat Utama:</h3>
            <ul>
              <li><strong>Alamat</strong>: <?php echo $alamat ?></li>
              <li><strong>RT / RW</strong>: <?php echo $rtrw ?></li>
              <li><strong>Kelurahan</strong>: <?php echo $kelurahan ?></li>
              <li><strong>Kecamatan</strong>: <?php echo $kecamatan ?></li>
              <li><strong>Kabupaten</strong>: <?php echo $kabupaten ?></li>
              <li><strong>Provinsi</strong>: <?php echo $provinsi ?></li>
              <li><strong>Kode Pos</strong>: <?php echo $kode_pos ?></li>
              <li><strong>Latitude</strong>: <?php echo $latitude ?></li>
              <li><strong>Longitude</strong>: <?php echo $longitude ?></li>
            </ul>
            <h3>Kontak:</h3>
            <ul>
              <li><strong>Nomer Telpon</strong>: <?php echo $notelp ?></li>
              <li><strong>Nomer Faks</strong>: <?php echo $nofaks ?></li>
              <li><strong>Email</strong>: <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
              <li><strong>Situs</strong>: <a href="<?php echo $situs ?>"><?php echo $situs ?></a></li>
            </ul>
          </div>

          <!-- Kurikulum -->
          <div class="tab-pane" id="kurikulum" role="tabpanel" aria-labelledby="kurikulum-tab" tabindex="0">
            <h3>Mata Pelajaran:</h3>
            <?php
            $id_sekolah = $_GET['id_sekolah'];
            $sql = "SELECT DISTINCT school_year FROM kurikulum WHERE id_sekolah = $id_sekolah ORDER BY school_year ASC";
            $result = mysqli_query($koneksi, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $schoolYear = $row['school_year'];
                    // Convert the school year to "Kelas" format
                    $kelasNumber = intval(substr($schoolYear, -1));
                    $kelasLabel = "Kelas " . $kelasNumber;
            ?>
                  <br>
                  <h4><?php echo $kelasLabel; ?> : </h4>
                  <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th width="50%">Mata Pelajaran</th>
                                <th width="45%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql_subjects = "SELECT * FROM kurikulum WHERE id_sekolah = $id_sekolah AND school_year = '$schoolYear'";
                            $result_subjects = mysqli_query($koneksi, $sql_subjects);
                            if (mysqli_num_rows($result_subjects) > 0) {
                                while ($row_subjects = mysqli_fetch_assoc($result_subjects)) {
                                    $subjectName = $row_subjects['subject_name'];
                                    $keterangan = $row_subjects['keterangan'];
                            ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $subjectName; ?></td>
                                        <td><?php echo $keterangan; ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='3'>Tidak ada data.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                  </div>
            <?php
                }
            } else {
                echo "Tidak ada data.";
            }
            ?>
          </div>
          <!-- end here-->
        </div>
      </div>

      <!-- Map Sekolah -->
      <div class="col-lg-12" data-aos="zoom-in" data-aos-delay="100">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Lokasi</strong></h2>
          </div>
          <div class="panel-body">
            <div id="map-canvas" style="width:100%;height:400px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Portfolio Details Section -->

<?php include "footer.php"; ?>
