<!-- ======= Footer ======= -->
<footer style="display: flex; justify-content: center; align-items: center; width: 100%; border-top: 1px solid #cddfff; height: 70px;">
  <p style="margin-bottom: 0 !important;">© 2023. Designed by Faisal</p>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- Jquery -->
<script src="assets/js/jquery-3.7.1.min.js"></script>

<!-- Sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function error() {
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        html: document.getElementById("msg").value,
        showConfirmButton: false,
        timer: 1500
      })
    }

    function successRegister() {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        html: document.getElementById("msg").value,
        showConfirmButton: false,
        timer: 1500
      }).then(function() {
        window.location.href = 'index';
      })
    }

    function errorRegister() {
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        html: document.getElementById("msg").value,
        showConfirmButton: false,
        timer: 1500
      }).then(function() {
        window.location.href = 'register';
      })
    }

    function successLoginUser() {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        html: document.getElementById("msg").value,
        showConfirmButton: false,
        timer: 1500
      }).then(function() {
        window.location.href = 'dashboard';
      })
    }

    function successLoginAdmin() {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        html: document.getElementById("msg").value,
        showConfirmButton: false,
        timer: 1500
      }).then(function() {
        window.location.href = 'admin/dashboard';
      })
    }
  </script>

  <!-- Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>