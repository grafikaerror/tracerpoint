<footer class="main-footer">
    <strong>Copyright &copy; Bariq Firjatullah <?= date('Y')?></strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/')?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/')?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/')?>dist/js/demo.js"></script>
<script src="<?= base_url('assets/')?>dist/js/myscript.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.js"></script>
<!-- page script -->
<script>
$('#summernote').summernote({
  tabsize: 2,
  height: 250,
  focus:true
});
  $('.custom-file-input').on('change', function(){
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });


  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  $('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
        url: "<?= base_url('admin/changeaccess'); ?>",
        type: 'post',
        data: {
            menuId: menuId,
            roleId: roleId
        },
        success: function() {
            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
        }
    });

});
</script>
</body>
</html>
