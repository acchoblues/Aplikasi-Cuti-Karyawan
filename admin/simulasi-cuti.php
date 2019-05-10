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
            Karyawan
            <small>HRMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Karyawan</li>
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
                  <h3 class="box-title">Data Karyawan</h3>
                  <div class="box-tools pull-right">
                  </div> 
                </div><!-- /.box-header -->
                
                <div class="box-body">
                <?php
             if(isset($_GET['aksi']) == 'update'){
        $nik = $_GET['nik'];
        $cut = $_GET['cuti'];
				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "UPDATE karyawan SET jumlah_cuti=(jumlah_cuti+$cut) WHERE nik='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
<!-- Content -->
<?php
					$date = date('Y-m-d');
                    //$date1= date_add($date, date_interval_create_from_date_string('10 days'));
					
					$query1="SELECT *,DATEDIFF(DATE_ADD(tanggal_masuk, INTERVAL 0 DAY), CURDATE()) as selisih, DATEDIFF(DATE_ADD(tanggal_masuk, INTERVAL 0 DAY), CURDATE()) as selisih1 FROM karyawan ";
                    
                   /** if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT *,DATE_ADD(k1_finish, INTERVAL -30 DAY) as kontrak_habis, DATEDIFF(DATE_ADD(k1_finish, INTERVAL -30 DAY), CURDATE()) as selisih FROM karyawan WHERE nama like '%$qcari%' AND status like '%$kontrak%'";
                    
                    } **/
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Tanggal Masuk</center></th>
						            <th><center>Status</center></th>
                        <th><center>Masa Kerja</center></th>
                        <th><center>Total</center></th>
                        <th><center>Tools</center></th>
						
                      </tr>
                  </thead>
                     <?php 
                     //$no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { //$no++; 
                    $a = ($data['selisih'] * -2)/2;
                    $c = $a/30 ;
                    $b = $data['status'];
                    ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td><?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['tanggal_masuk']; ?><center/></td>
                    <td><center><?php
                            if($data['status'] == 'TETAP'){
								echo '<span class="label label-success">TETAP</span>';
							}
                            else if ($data['status'] == 'PKWT' ){
								echo '<span class="label label-primary">PKWT</span>';
							}
                            else if ($data['status'] == 'PKWTT' ){
								echo '<span class="label label-info">PKWTT</span>';
							}
                    
                    ?></center></td>
                    <td><center><?php echo $a; ?> Hari<center/></td>
                    <td><center><?php
                          if($a == "PKWT"){
                            if($c > '6' && $c <'12'){
                              $valcuti = '3';
                              echo $valcuti;
                            } else if($c > '12' && $c <'24'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '24' && $c <'36'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '36' && $c <'48'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '48' && $c <'60'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '60' && $c <'72'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '72' && $c <'84'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '84' && $c <'96'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '96' && $c <'108'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '108' && $c <'120'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else {
                              echo "0";
                            }
                          } else if ($b == "PKWTT"){
                            if($c > '3' && $a <'6'){
                              $valcuti = '3';
                              echo $valcuti;
                            } else if($c > '6' && $c <'9'){
                              $valcuti = '6';
                              echo $valcuti;
                            } else if($c > '12' && $c <'24'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '24' && $c <'36'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '36' && $c <'48'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '48' && $c <'60'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '60' && $c <'72'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '72' && $c <'84'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '84' && $c <'96'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '96' && $c <'108'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else if($c > '108' && $c <'120'){
                              $valcuti = '12';
                              echo $valcuti;
                            } else {
                              echo "0";
                            }
                          }
                           
                    ?> Hari</center></td>
                    <td><a href="simulasi-cuti.php?aksi=update&&cuti=<?php echo $valcuti; ?>&&nik=<?php echo $data['nik']; ?>" class="btn btn-sm btn-primary">Input Cuti</a></td>
                    </tr> <?php   
              } 
              ?>
                   </tbody>
                   </table>
<!-- Content -->

                </div><!-- /.box-body -->
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
	  
  </body>
</html>
