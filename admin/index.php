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
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
           <?php $tampil=mysqli_query($koneksi, "select * from karyawan order by nik desc");
                        $total=mysqli_num_rows($tampil);
                    ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $total; ?></h3>
                  <p>Karyawan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="karyawan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <?php $tampil1=mysqli_query($koneksi, "select * from jabatan order by id_jabatan desc");
                        $total1=mysqli_num_rows($tampil1);
                    ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $total1; ?><!--<sup style="font-size: 20px">%</sup>--></h3>
                  <p>Jabatan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <a href="jabatan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <?php $tampil2=mysqli_query($koneksi, "select * from departemen order by id_dept desc");
                        $total2=mysqli_num_rows($tampil2);
                    ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $total2; ?></h3>
                  <p>Departemen</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cube"></i>
                </div>
                <a href="departemen.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <?php $tampil3=mysqli_query($koneksi, "select * from cuti order by kode desc");
                        $total3=mysqli_num_rows($tampil3);
                    ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $total3; ?></h3>
                  <p>Cuti</p>
                </div>
                <div class="icon">
                  <i class="fa fa-spin fa-refresh"></i>
                </div>
                <a href="cuti.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
                <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Cuti Karyawan Yang Habis / Kurang</h3>
                  <div class="box-tools pull-right">
                  <!--<form action='index.php' method="POST">
    	             <div class="input-group" style="width: 230px;">
                      <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Kategori">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    </form>-->
                  </div> 
                </div><!-- /.box-header -->
                 <?php
             if(isset($_GET['hal']) == 'hapus'){
				$id = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id='$id'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
                <div class="scroller box-body">
                <!-- <form action='admin.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan User ID dan Username' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='admin.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
            </form>-->
                  <?php
                    $query1="select * from karyawan where jumlah_cuti <=0";
                    
                    /** if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT * FROM  kategori 
	               where kode like '%$qcari%'
	               or nama_kategori like '%$qcari%'  ";
                    }**/
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-responsive table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>Nik </center></th>
                        <th><center>Nama</center></th>
                        <th><center>Sisa Cuti </center></th>
                      </tr>
                  </thead>
                     <?php 
                     //$no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { //$no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td><center><?php echo $data['nama'];?></center></td>
                    <td><center><?php echo $data['jumlah_cuti'];?> Hari</center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                </div><!-- /.box-body -->
                <!--<div class="box-footer clearfix no-border">
                  <a href="input-kategori.php" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Tambah Kategori</a>
                  </div>-->
              </div><!-- /.box -->

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
            
<div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Cuti Hari Ini</h3>
                  <div class="box-tools pull-right">
                  <!--<form action='index.php' method="POST">
    	             <div class="input-group" style="width: 230px;">
                      <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Kategori">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    </form>-->
                  </div> 
                </div><!-- /.box-header -->
                <div class="box-body">
                <!-- <form action='admin.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan User ID dan Username' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='admin.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
            </form>-->
                  <?php
                  $tgl = date("Y-m-d");
                    $query1="select karyawan.*, cuti.* from karyawan, cuti where karyawan.nik=cuti.nik and cuti.tanggal_awal='$tgl'";
                    
                    /** if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT * FROM  kategori 
	               where kode like '%$qcari%'
	               or nama_kategori like '%$qcari%'  ";
                    }**/
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-responsive table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>NIK</center></th>
                        <th><center>Nama</center></th>
                        <th><center>Jumlah Cuti </center></th>
                        <th><center>Keterangan </center></th>
                      </tr>
                  </thead>
                     <?php 
                     //$no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { //$no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td><center><?php echo $data['nama'];?></center></td>
                    <td><center><?php echo $data['jumlah_cuti'];?> </center></td>
                    <td><center><?php echo $data['ket'];?> </center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                </div><!-- /.box-body -->
                <!--<div class="box-footer clearfix no-border">
                  <a href="input-kategori.php" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Tambah Kategori</a>
                  </div>-->
              </div>
              

              

              

            </section><!-- right col -->
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
    <!-- jQuery UI 1.11.4 -->
    <script src="../css/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
  </body>
</html>
