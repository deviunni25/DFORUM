</div>
  <!-- /.content-wrapper -->
  

<footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="https://google.com">DU.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/admins/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/admins/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="<?php echo base_url(); ?>assets/admins/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/admins/dist/js/demo.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/admins/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/admins/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admins/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admins/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admins/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admins/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admins/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>


<script>
  const currentLocation = location.href;
  const menuItem = document.querySelectorAll('.left-nav');
  const menuLength = menuItem.length;
  for(let m = 0; m<menuLength; m++){
    if(menuItem[m].href === currentLocation){
      menuItem[m].className = "nav-link left-nav active";
    }
  }
  </script>

  
  
<script>
  function toastSuccess(status,message){
     var Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
     });	
  
     Toast.fire({
         icon: status,
         title: message
       })
  }
  
 </script>

</body>
</html>
