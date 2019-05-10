<?php include "session.php"; ?>
<!DOCTYPE html>
<html>
  <?php include "head.php"; ?>
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

      <?php include "header.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include "menu.php"; ?>

<?php include "waktu.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Halaman tidak ditemukan
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">404</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">404</h3>
                  <div class="box-tools pull-right">
                  
                  </div> 
                </div><!-- /.box-header -->
               
                <div class="box-body">
                <div class="row">
                <div class="col-lg-12">
<pre>
Untuk mendapatkan fitur ini silahkan hubungi admin www.hakkoblogs.com  di : 

No Telepon	:	0856 949 848 03
SMS/WA/TG	:	0856 949 848 03
E-mail	:	hakkobiorichard@gmail.com | hakko_bio_richard@yahoo.co.id
Blog	:	www.hakkoblogs.com
Website	:	www.niqoweb.com
</pre>
                </div>
           </div>
           </div><!-- /.box-body --><br/>
              </div><!-- /.box -->
              <?php if(isset($_POST['tglawal']) && isset($_POST['tglakhir'])){ ?>
            <div class="text-right">
                  <a href="laporan-balance-excel.php?tglawal=<?php echo $_POST['tglawal']; ?>&tglakhir=<?php echo $_POST['tglakhir']; ?>" class="btn btn-sm btn-success">Cetak Excel <i class="fa fa-print"></i></a>
                  <a href="laporan-balance-pdf.php?tglawal=<?php echo $_POST['tglawal']; ?>&tglakhir=<?php echo $_POST['tglakhir']; ?>" class="btn btn-sm btn-danger">Cetak PDF <i class="fa fa-print"></i></a>
              </div> <?php } else { echo "";} ?>

            </section><!-- /.Left col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include "footer.php"; ?>

      <?php include "sidecontrol.php"; ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>

    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>

    <script src="../plugins/select2/select2.full.min.js"></script>

    <script>
	//options method for call datepicker
	$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
	
    </script>

  <script>
     $(function () {
    $(".select2").select2();
    });
    </script>
  </body>
</html>
