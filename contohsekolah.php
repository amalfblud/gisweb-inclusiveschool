<?php include "header.php"; ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contoh Sekolah</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>SDN 008 Balikpapan Kota</li>
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
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/sekolah/logo.png" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/sekolah/logo2.png" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/sekolah/logo3.png" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-6" id="informasi-sekolah">
            <h3>Informasi Sekolah:</h3>
            <ul class="list-group information-list">
              <li class="list-group-item d-flex justify-content-between">
                <span class="label">Nama:</span>
                <span class="value">SD Negeri 008 Balikpapan Kota</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span class="label">Status:</span>
                <span class="value">Negeri</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span class="label">NPSN:</span>
                <span class="value">30402860</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span class="label">Kebutuhan Khusus Dilayani:</span>
                <span class="value">K,Q</span>
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
                <button class="nav-link" id="kontak-tab" data-bs-toggle="tab" data-bs-target="#kontak" type="button" role="tab" aria-controls="kurikulum" aria-selected="false">Kurikulum</button>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="profil" role="tabpanel" aria-labelledby="profil-tab" tabindex="0">
                <h3>Informasi Sekolah: </h3>
                  <ul>
                    <li><strong>Nama</strong>: SD Negeri 008 Balikpapan Kota</li>
                    <li><strong>Status</strong>: Negeri</li>
                    <li><strong>NPSN</strong>: 30402860</li>
                    <li><strong>Kebutuhan Khusus Dilayani</strong>: K,Q</li>
                  </ul>
              </div>
              <div class="tab-pane" id="rekap" role="tabpanel" aria-labelledby="rekap-tab" tabindex="0">...</div>
              <div class="tab-pane" id="kontak" role="tabpanel" aria-labelledby="kontak-tab" tabindex="0">
                <h3>Kontak Utama: </h3>
                  <ul>
                    <li><strong>Alamat</strong>: Jl. Jend. Sudirman Rt. 22 No. 03</li>
                    <li><strong>Kelurahan</strong>: Damai</li>
                    <li><strong>Kecamatan</strong>: Balikpapan Kota</li>
                    <li><strong>Kode Pos</strong>: 76114</li>
                  </ul>
              </div>
            </div>
          </div>
          

          <!--Map Sekolah-->
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d997.2091188069446!2d116.8578037278476!3d-1.271134390486573!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df146c29ac06f89%3A0x4a375f749099212e!2sSD%20Negeri%20008%20Balikpapan%20Kota!5e0!3m2!1sen!2sid!4v1686157059432!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

<?php include "footer.php"; ?>