<?php include "session.php"; ?>
<!DOCTYPE html>
<html>
 <?php include "head.php" ?>
  </head>
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
            Cuti
            <small>HRMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Cuti</li>
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
                  <h3 class="box-title">Data Cuti Karyawan</h3>
                  <div class="box-tools pull-right">
                  </div> 
                </div><!-- /.box-header -->
                
                <div class="box-body">
                <?php
             if(isset($_GET['aksi']) == 'delete'){


        $id = $_GET['id'];
        $nik= $_GET['nik'];

        $sql = mysqli_query($koneksi, "SELECT * FROM cuti WHERE kode='$id'");
             if(mysqli_num_rows($sql) == 0){
        //header("Location: cuti.php");
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
			}else{
				$row = mysqli_fetch_assoc($sql);
            }
        $jumlah= $row['jumlah'];
				$cek = mysqli_query($koneksi, "SELECT * FROM cuti WHERE kode='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{

          $delete = mysqli_query($koneksi, "DELETE FROM cuti WHERE kode='$id'");
          
          $qu	   = mysqli_query($koneksi, "UPDATE karyawan SET jumlah_cuti=(jumlah_cuti+'$jumlah') WHERE nik='$nik'");
					if($delete&&$qu){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
          
				}
			}
			?>
                <!-- <form action='admin.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan User ID dan Username' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='admin.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
            </form>-->
            <!-- <a href="cuti_importxls.php" class="btn btn-sm btn-warning"><i class="fa fa-file"></i> Import Excel</a> --><a href="cuti_exportxls.php" class="btn btn-sm btn-success"><i class="fa fa-file"></i> Export Excel</a><br /><br />
                   <table id="lookup" class="table table-bordered table-hover">  
	<thead bgcolor="eeeeee" align="center">
      <tr>
	  
       <th>Kode</th>
	   <th>Nik</th>
       <th>Tanggal Awal</th>
       <th>Tanggal Akhir</th>
       <th>Jumlah</th>
       <th>Jenis Cuti</th>
       <th>Keterangan</th>
       <th>Status</th>
	   <th class="text-center"> Action </th> 
	  
      </tr>
    </thead>
    <tbody>
	 
					 
    </tbody>
  </table>  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                  <a href="input-cuti.php" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Buat Cuti</a>
                  </div>
              </div><!-- /.box -->

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

    <!-- jQuery 2.1.4 -->
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
	  <!--<script type="text/javascript"> 

            $(function () {
                $("#lookup").dataTable({"lengthMenu":[25,50,75,100],"pageLength":25});
            });
  
   
        </script>-->
 <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-data-cuti.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
  </body>
</html>
