<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wilian Perkasa Group</title>
    <meta name="author" content="https:/ibs.com">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/ifassetadm/admin/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/style.css">

    <!-- Konfigugasi sweetalert2 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>ifsweetalert/sweetalert.css">

    <link href="<?php echo base_url(); ?>ifassetadm/bootstrap-combobox.css" media="screen" rel="stylesheet" type="text/css">
    <style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>
    <script type="text/javascript" src="<?php echo base_url(); ?>/ifassetadm/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
    
    <!-- Konfigugasi sweetalert2 -->
    <script src="<?php echo base_url() ?>ifsweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>ifsweetalert/sweetalert-dev.js"></script>

    <script src="<?php echo base_url(''); ?>ifassetadm/js/jlib.js"></script>
    <script src="<?php echo base_url(''); ?>ifassetadm/ckeditor/ckeditor.js"></script>
 
    <script language="javascript" type="text/javascript">
      function popitup(url) {
        newwindow=window.open(url,'name','height=700,width=550');
        if (window.focus) {newwindow.focus()}
        return false;
      }
    </script>

    <script language="javascript" type="text/javascript">
      function popup(url) {
        newwindow=window.open(url,'name','height=500,width=1050');
        if (window.focus) {newwindow.focus()}
        return false;
      }
    </script>   

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <?php $row = $this->model_app->view_one_address('uti_ifconfigsys',array('conf_kode' => 1),'conf_kode')->row_array(); ?>
    <div class="wrapper">
      <header class="main-header">
          <?php include "main-header.php"; ?>
      </header>
      
      <aside class="main-sidebar">
          <?php 
            include "menu-admin.php";  
          ?>
      </aside>

      <div class="content-wrapper">

      <div class="alert alert-warning"  style='border-radius:0px'>
      <img class='pull-left' style='width:50px; margin-right:10px; border:1px solid #e3e3e3' src='<?php echo base_url()."ifassetadm/images/$row[logo]"; ?>'>
        <h3 style='margin:0px;'><b><?php echo $row['conf_nama'] ?></b></h3>
        <p style='color:#000'><?php echo "$row[conf_alamat] - $row[city_id], $row[state_id], $row[country_id]"; ?></p>

      </div>
        <section class="content">
            <?php echo $contents; ?>
        </section>
      <div style='clear:both'></div>

      </div><!-- /.content-wrapper -->
          <footer class="main-footer">
              <?php include "footer.php"; ?>
          </footer>
      </div><!-- ./wrapper -->

      <!-- jQuery 2.1.4 -->    
      <!-- jQuery UI 1.11.4 -->

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>ifassetadm/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/datepicker/bootstrap-datepicker.js"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>ifassetadm/admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>ifassetadm/admin/dist/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>ifassetadm/js/bootstrap-combobox.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.combobox').combobox()
        });
    </script>
    <script>
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy"});
    $('#datepickerr').datepicker({
        format: "dd/mm/yyyy"});
    $('#datepickerrr').datepicker({
        format: "dd/mm/yyyy"});
    $("#datepicker1").datepicker({
        format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months"
    });

    $(function () { 
            $("#tabel1").DataTable();
            $('#tabel2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "scrollY": "300px",
              "scrollX": true,
              "autoWidth": false,
              "scrollCollapse": true
            });
        });    


    var url = window.location;
    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
      return this.href == url;
    }).closest('.treeview').addClass('active');
    </script>
    
    <script>
      $(function () {
        $(".textarea").wysihtml5();
      });

      CKEDITOR.replace('editor1' ,{
        filebrowserImageBrowseUrl : '<?php echo base_url('ifassetadm/kcfinder'); ?>'
      });
    </script>

    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer"></div>
          </div>
      </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="myModalRiwayat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer"></div>
          </div>
      </div>
    </div>
 
    <!---- Dialog MessaBox Konfirmasi --->
    <script>
        $(document).ready(function() {		
	          $('a[msgbox-confirm]').click(function(ev) {

                var href = $(this).attr('href');

                if(!$('#dataConfirmModal').length) {
                    $('body').append('<div id="dataConfirmModal" class="modal fade" tableindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hiden="true"><div class="modal-dialog modal-sl"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hiden="ture">&times;</button><h4 class="modal-title" id="dataConfrimLabel"><span class="glyphicon glyphicon-user"></span>&nbsp;Konfirmasi...</h4></span></div><img src="<?= base_url('ifassetadm/imgmessage/msg32.png'); ?>" style="float:left;margin:7px;width:39px;height:38px;"><div class="modal-body"></div><div class="modal-footer"><td><center></button><a class="btn btn-danger btn-sx" aria-hiden="true" id="dataConfirmOK"><span class="glyphicon glyphicon-trash"></span> Hapus </a><button type="button" class="btn btn-default btn-sx" data-dismiss="modal" aria-hiden=""true" </center></td><span class="glyphicon glyphicon glyphicon-log-out"></span> Tidak </div></div></div></div>'); 
                    //$('body').append('<div id="dataConfirmModal" class="modal fade" tableindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hiden="true"><div class="modal-dialog modal-sl"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hiden="ture">&times;</button><h4 class="modal-title" id="dataConfrimLabel"><span class="glyphicon glyphicon-user"></span>&nbsp;Konfirmasi...</h4></span></div><img src="<?= base_url('ifassetadm/imgmessage/msg32.png'); ?>" style="float:left;margin:7px;width:39px;height:38px;"><div class="modal-body"></div><div class="modal-footer"><td><center></button><a class="btn btn-danger btn-sx" aria-hiden="true" id="dataConfirmOK"><span class="glyphicon glyphicon-trash"></span> Hapus </a><button type="button" class="btn btn-default btn-sx" data-dismiss="modal" aria-hiden=""true" style="float: center;"><span class="glyphicon glyphicon glyphicon-log-out"></span> Tidak </div></div></div></div>'); 
                    //$('body').append('<div id="dataConfirmModal" class="modal fade" tableindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hiden="true"><div class="modal-dialog modal-sl"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hiden="ture">&times;</button><h4 class="modal-title" id="dataConfrimLabel"><span class="glyphicon glyphicon-user"></span>&nbsp;Konfirmasi...</h4></span></div><img src="<?= base_url('ifassetadm/imgmessage/msg32.png'); ?>" style="float:left;margin:7px;width:39px;height:38px;"><div class="modal-body"></div><div class="modal-footer"><td><center></button><a class="btn btn-danger btn-sx" aria-hiden="true" id="dataConfirmOK"><span class="glyphicon glyphicon-trash"></span> Hapus </a><button type="button" class="btn btn-default btn-sx" data-dismiss="modal" aria-hiden=""true" style="float: center;"> Tidak </div></div></div></div>');
                }

                $('#dataConfirmModal').find('.modal-body').text($(this).attr('msgbox-confirm'));

                $('#dataConfirmOK').attr('href',href);

                $('#dataConfirmModal').modal({show:true});

                return false;
		        });
	      });
        
    </script>

    <script>
        $(document).ready(function() {
          $('#example1').DataTable({
            "bInfo": true,
            "lengthChange": true,
            "paging": true,
            "searching": true,
            "scrollX": true,
            "autoWidth": true,
            "ordering": true,
          });
          $('#example2').DataTable({
            "bInfo": false,
            "lengthChange": false,
            "paging": true,
            "searching": false,
            "scrollX": true,
            "autoWidth": false,
            "ordering": false,
          });
        });

        /* scrollY: "300px", */
        
    </script>

  </body>
</html>