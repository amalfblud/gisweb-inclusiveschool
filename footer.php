  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>InclusiveSchool</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://www.twitter.com/muliauniversity/" class="twitter" aria-label="Mulia University Twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/UMBalikpapan" class="facebook" aria-label="Mulia University Facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/universitasmulia/" class="instagram" aria-label="Mulia University Instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCHwsF-OmJG5DZWP3FN8NA7Q" class="youtube" aria-label="Mulia University Youtube"><i class="bx bxl-youtube"></i></a>
        <a id="shortcutButton" class="shortcut-button" aria-label="Keyboard Shortcuts"><i class="bi bi-info-circle"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" aria-label="Back to top"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

<!-- Script for Keyboard Shortcuts Modal and Access Key Toggle -->
<script>
  var accessKeysEnabled = true;
  var accessKeyLinks = document.querySelectorAll('.nav-link[accesskey]');
  var toggleAccessKeyButton = document.getElementById('toggleAccessKeyButton');
  var shortcutModal = new bootstrap.Modal(document.getElementById('shortcutModal'), { backdrop: true });

  // Show the modal when the "Keyboard Shortcuts" button is clicked
  shortcutButton.addEventListener('click', function () {
    shortcutModal.show();
  });

  // Toggle Access Keys
  function toggleAccessKeys() {
    accessKeysEnabled = !accessKeysEnabled;

    accessKeyLinks.forEach(function(link) {
      if (!accessKeysEnabled) {
        link.removeAttribute('accesskey');
      } else {
        link.setAttribute('accesskey', link.getAttribute('data-accesskey'));
      }
    });

    if (accessKeysEnabled) {
      toggleAccessKeyButton.innerText = 'Matikan Shortcut Keyboard';
      toggleAccessKeyButton.classList.remove('btn-success');
      toggleAccessKeyButton.classList.add('btn-danger');
    } else {
      toggleAccessKeyButton.innerText = 'Shortcut Keyboard Mati';
      toggleAccessKeyButton.classList.remove('btn-danger');
      toggleAccessKeyButton.classList.add('btn-secondary');
      toggleAccessKeyButton.disabled = true; // Disable the button
    }
  }

  toggleAccessKeyButton.addEventListener('click', toggleAccessKeys);

  // Ensure that the modal backdrop is properly cleared after modal is closed
  shortcutModal._element.addEventListener('hidden.bs.modal', function (event) {
    document.body.classList.remove('modal-open');
    document.querySelectorAll('.modal-backdrop').forEach(function (backdrop) {
      backdrop.remove();
    });
  });

  // Show the modal only on the first visit
  document.addEventListener('DOMContentLoaded', function () {
    var modalShown = localStorage.getItem('shortcutModalShown');
    if (!modalShown) {
      shortcutModal.show();
      localStorage.setItem('shortcutModalShown', 'true');
    }
  });
</script>
</body>
</html>
