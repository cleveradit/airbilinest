        <!-- Main Content End -->
      </div> <!-- page-body-wrapper -->
    </div> <!-- container-scroller -->

    <!-- JS -->
    <!-- plugins:js -->
    <script src="<?php echo base_url() ?>hcp/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- `endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url() ?>hcp/assets/vendors/select2/select2.min.js"></script>
    <script src="<?php echo base_url() ?>hcp/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>hcp/assets/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    <script src="<?php echo base_url() ?>hcp/assets/vendors/chart.js/chart.umd.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo base_url() ?>hcp/assets/js/chart.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url() ?>hcp/assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url() ?>hcp/assets/js/misc.js"></script>
    <script src="<?php echo base_url() ?>hcp/assets/js/settings.js"></script>
    <script src="<?php echo base_url() ?>hcp/assets/js/todolist.js"></script>
    <script src="<?php echo base_url() ?>hcp/assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo base_url() ?>hcp/assets/js/file-upload.js"></script>
    <script src="<?php echo base_url() ?>hcp/assets/js/typeahead.js"></script>
    <script src="<?php echo base_url() ?>hcp/assets/js/select2.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.bootstrap4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.dataTables.js"></script>
    <!-- End custom js for this page -->
     <script>
        function showSuccessToast(message = "Berhasil!") {
            $.toast({
                heading: 'Success',
                text: message,
                showHideTransition: 'slide',
                icon: 'success',
                loaderBg: '#f96868',
                position: 'top-right'
            });
        }

        function showDangerToast(message = "Terjadi kesalahan!") {
            $.toast({
            heading: 'Error',
            text: message,
            showHideTransition: 'fade',
            icon: 'error',
            loaderBg: '#f96868',
            position: 'top-right'
            });
        }
     </script>
  </body>
</html>