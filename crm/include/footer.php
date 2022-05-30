<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.o
    </div>
    <strong>Copyright &copy; 2020  CRM .</strong>
  </footer>

  <!-- Control Sidebar -->
  <?php include('rightsidebar.php'); ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- SweetAlert ->
<script src="plugins/sweetalert/sweetalert.min.js"></script>

<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$(function () {
  Message('<?php echo $t=$_REQUEST['type'] ?? ''; ?>','<?php echo $m=$_REQUEST['msg'] ?? ''; ?>');

 // $('#example1').DataTable();
$(".select2").select2({
   width: 'resolve' // need to override the changed default
});
$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })
   });

  $.widget.bridge('uibutton', $.ui.button);

  function Message(type,msg) {

if(type == "success") {
  toastr["success"](msg, "Success!")
 			toastr.options = {
 				  "closeButton": true,
 				  "debug": false,
 				  "newestOnTop": true,
 				  "progressBar": true,
 				  "positionClass": "toast-top-right",
 				  "preventDuplicates": false,
 				  "onclick": null,
 				  "showDuration": "300",
 				  "hideDuration": "1000",
 				  "timeOut": "5000",
 				  "extendedTimeOut": "1000",
 				  "showEasing": "swing",
 				  "hideEasing": "linear",
 				  "showMethod": "fadeIn",
 				  "hideMethod": "fadeOut"
 					}
  // swal({
  //      title: msg,
  //      icon: "success",
  //      timer: 2e3
  //       });
    // RecordView();
} else if( type == "error") {
  toastr["error"](msg, "Error!")
           toastr.options = {
               "closeButton": true,
               "debug": false,
               "newestOnTop": true,
               "progressBar": true,
               "positionClass": "toast-top-right",
               "preventDuplicates": false,
               "onclick": null,
               "showDuration": "300",
               "hideDuration": "1000",
               "timeOut": "5000",
               "extendedTimeOut": "1000",
               "showEasing": "swing",
               "hideEasing": "linear",
               "showMethod": "fadeIn",
               "hideMethod": "fadeOut"
               }
  // swal({
  //        title: msg,
  //        icon: "error",
  //        timer: 2e3
  //      });
    // RecordView();
}
 else { }

}

</script>

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- <script src="plugins/morris/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<script src="plugins/pace/pace.min.js"></script>

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- lightBox js -->
<script src="plugins/lightbox/js/lightbox.min.js"></script>


<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="js-controller/global.js"></script>
<script src="js-controller/dyn-table.js"></script>
<!----Ckeditor --->
<script src="plugins/ckeditor/ckeditor.js"></script>
<script src="plugins/ckeditor/config.js"></script>
 <script src="plugins/ckeditor/build-config.js"></script>
 <script src="plugins/ckeditor/styles.js"></script>

<div id="loader" style="background-color: white; height: 750px; text-align: center; display: none; position: fixed; top: 0px; opacity: 0.75; width: 100%; padding: 10% 0% 10% 15%;">
  <img src="dist/img/loading1.gif" style="">
  <h1>Please Wait while we process...</h1></div>



  <div class="modal fade" id="modal-default">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">View Records</h4>
             </div>
             <div class="modal-body">
               <div id="loader" style="text-align: center;  width: 100%;">
                 <img src="dist/img/loading1.gif" style="">
                 <h1>Please Wait while we process...</h1></div>
             </div>
             <div class="modal-footer" style="text-align:center !important">
               <button type="button" class="btn btn-default text-center" data-dismiss="modal">Close</button>
               <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
             </div>
           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>
       <!-- /.modal -->
</body>
</html>
