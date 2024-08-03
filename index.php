<?php include "header.php"; ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Sekolah Inklusi dan Sekolah Luar Biasa</h1>
      <h2>Tempat Pencarian Sekolah Inklusi dan Sekolah Luar Biasa di Kota Balikpapan</h2>
      <a href="pencariansekolah.php" class="btn-get-started scrollto">Cari Sekolah</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <h2>InclusiveSchool</h2>
            <h3>InclusiveSchool adalah website pencarian Sekolah Inklusi dan Sekolah Luar Biasa di Kota Balikpapan</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <p>
              Pada website ini tesedia beberapa fitur dan informasi tentang sekolah yang dicari, antara lain: 
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Informasi Sekolah</li>
              <li><i class="ri-check-double-line"></i> Fasilitas yang tersedia</li>
              <li><i class="ri-check-double-line"></i> Kurikulum Sekolah</li>
              <li><i class="ri-check-double-line"></i> Lokasi sekolah pada peta</li>
            </ul>
            <p class="fst-italic">
              Untuk saat ini website ini hanya tersedia untuk pencarian sekolah yang berlokasi di kota Balikpapan.
            </p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1" class="purecounter"></span>
            <p>Sekolah Inklusi</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1" class="purecounter"></span>
            <p>Sekolah Luar Biasa</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->


<!-- ======= Maps Section ======= -->
  <section class="price-area section-gap">
    <section id="sekolah-map" class="about-info-area section-gap">
    <div class="container">
    <div class="row align-items-center">

      <div id="map" style="width:100%;height:480px;"></div>
      <script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap"></script>

      <script type="text/javascript">
        function initialize() {

          var mapOptions = {
            zoom: 12.5,
            center: new google.maps.LatLng(-1.2372366,116.8486504),
            disableDefaultUI: false
          };

          var mapElement = document.getElementById('map');

          var map = new google.maps.Map(mapElement, mapOptions);

          setMarkers(map, officeLocations);

        }

        var officeLocations = [
          <?php
          $data = file_get_contents('https://beritaviralfb.com/BB/ambildata.php');
          $no = 1;
          if (json_decode($data, true)) {
            $obj = json_decode($data);
            foreach ($obj->results as $item) {
          ?>[<?php echo $item->id_sekolah ?>, '<?php echo $item->nama_sekolah ?>', '<?php echo $item->alamat ?>', <?php echo $item->longitude ?>, <?php echo $item->latitude ?>],
          <?php
            }
          }
          ?>
        ];

        function setMarkers(map, locations) {
          var globalPin = 'img/marker.png';

          for (var i = 0; i < locations.length; i++) {

            var office = locations[i];
            var myLatLng = new google.maps.LatLng(office[4], office[3]);
            var infowindow = new google.maps.InfoWindow({
              content: contentString
            });

            var contentString =
              '<div id="content">' +
              '<div id="siteNotice">' +
              '</div>' +
              '<h5 id="firstHeading" class="firstHeading">' + office[1] + '</h5>' +
              '<div id="bodyContent">' +
              '<a href=detailsekolah.php?id_sekolah=' + office[0] + '>Info Detail</a>' +
              '</div>' +
              '</div>';

            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: office[1],
            });

            google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
          }
        }

        function getInfoCallback(map, content) {
          var infowindow = new google.maps.InfoWindow({
            content: content
          });
          return function() {
            infowindow.setContent(content);
            infowindow.open(map, this);
          };
        }

        initialize();
      </script>

      </div>


    </div>
  </section>
<!-- End Maps Section -->

  </main><!-- End #main -->

  <?php include "footer.php"; ?>