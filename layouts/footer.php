  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="display: flex; justify-content: center; align-items: center">
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

  <!-- Jquery -->
  <script src="assets/js/jquery-3.7.1.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">
    function successCategory() {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        html: document.getElementById("msg").value,
        showConfirmButton: false,
        timer: 1500
      }).then(function() {
        window.location.href = 'category-list';
      })
    }

    function errorCategory() {
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        html: document.getElementById("msg").value,
        showConfirmButton: false,
        timer: 1500
      }).then(function() {
        window.location.href = 'category-list';
      })
    }

    var deleteCategory = (id) => {
      Swal.fire({
          title: 'Apakah kamu yakin',
          html: '<p>Ingin menghapus?</p>',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak',
      }).then(( result ) => {
          if ( result.isConfirmed ) {
              window.location.href = 'category-list.php?id=' + id;
          } else {
              Swal.fire('Batal', 'Tidak menghapus kategori', 'info');
          }
      })
    }

    var deleteTask = (id) => {
      Swal.fire({
          title: 'Apakah kamu yakin',
          html: '<p>Ingin menghapus?</p>',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak',
      }).then(( result ) => {
          if ( result.isConfirmed ) {
              window.location.href = 'task-list.php?id=' + id;
          } else {
              Swal.fire('Batal', 'Tidak menghapus kategori', 'info');
          }
      })
    }

    function successTask() {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        html: document.getElementById("msg").value,
        showConfirmButton: false,
        timer: 1500
      }).then(function() {
        window.location.href = 'task-list';
      })
    }

    function errorTask() {
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        html: document.getElementById("msg").value,
        showConfirmButton: false,
        timer: 1500
      }).then(function() {
        window.location.href = 'task-list';
      })
    }
  </script>

  <!-- Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#priority-add').select2();
    });

    $(document).ready(function() {
      $('#category-add').select2();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.priority-edit').select2();
    });

    $(document).ready(function() {
      $('.category-edit').select2();
    });
  </script>
</body>

</html>