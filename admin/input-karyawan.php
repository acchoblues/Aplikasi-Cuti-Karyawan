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
            Karyawan
            <small>Human Resource Management System</small>
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
                  <h3 class="box-title">Input Data Karyawan</h3>
                  <div class="box-tools pull-right">
              <!-- <form action='admin.php' method="POST">
    	             <div class="input-group" style="width: 230px;">
                      <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Usename Atau Nama">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                        <a href="admin.php" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                      </div>
                    </div>
                    </form> -->
                  </div> 
                </div><!-- /.box-header -->
                <?php
                if(isset($_POST['input'])){
			$namafolder="gambar_admin/"; //tempat menyimpan file
      
      if (!empty($_FILES["nama_file"]["tmp_name"]))
      {
              $jenis_gambar=$_FILES['nama_file']['type'];
              $nik           = $_POST['nik'];
              $nama          = $_POST['nama'];
              $tanggal_masuk = $_POST['tanggal_masuk'];
              $departemen    = $_POST['departemen'];
              $jabatan       = $_POST['jabatan'];
              $status       = $_POST['status'];
              $jumlah_cuti   = $_POST['jumlah_cuti'];
              $username      = $_POST['username'];
              $password1      = $_POST['password'];
              $password      = sha1("$password1");
              $level         = $_POST['level'];
          
        if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
        {			
          $gambar = $namafolder . basename($_FILES['nama_file']['name']);		
          if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            $sql="INSERT INTO karyawan (nik,nama,tanggal_masuk,departemen,jabatan,status,jumlah_cuti,username,password,level,gambar) VALUES
                  ('$nik','$nama','$tanggal_masuk','$departemen','$jabatan','$status','$jumlah_cuti','$username','$password','$level','$gambar')";
            $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
            //echo "Gambar berhasil dikirim ke direktori".$gambar;
                  echo "<script>alert('Data berhasil dimasukan!'); window.location = 'karyawan.php'</script>";	   
          } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p>Gambar gagal dikirim</p></div>';
         }
        } else {
         echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Jenis gambar yang anda kirim salah. Harus .jpg .gif .png</div>';
        }
     } else {
       echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Anda Belum Memilih Gambar</div>';
     }
    }
			?>
                <div class="box-body">
                <form class="form-horizontal style-form" action="input-karyawan.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NIK</label>
                              <div class="col-sm-4">
                                  <input name="nik" type="text" id="nik" class="form-control" placeholder="NIK" autocomplete="off" autofocus="on" required="required" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Karyawan</label>
                              <div class="col-sm-4">
                            <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Karyawan" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
                              <div class="col-sm-4">
                              <input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='tanggal_masuk' id="tanggal_masuk" placeholder='Tanggal Masuk' autocomplete='off' required='required' />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Departemen</label>
                              <div class="col-sm-4">
                              <select name="departemen" id="departemen" class="form-control select2" required>
                              <option value=""> --- Pilih Departemen --- </option>
                              <?php 
                    $query2="select * from departemen order by id_dept";
                    $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
							
							<option value="<?php echo $data1['nama_dept'];?>"><?php echo $data1['id_dept'];?> - <?php echo $data1['nama_dept'];?></option>
						    <?php } ?>
                              
                              </select> 
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                              <div class="col-sm-4">
                              <select name="jabatan" id="jabatan" class="form-control select2" required>
                              <option value=""> --- Pilih Jabatan --- </option>
                              <?php 
                    $query2="select * from jabatan order by id_jabatan";
                    $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
							
							<option value="<?php echo $data1['jabatan'];?>"><?php echo $data1['id_jabatan'];?> - <?php echo $data1['jabatan'];?></option>
						    <?php } ?>
                              
                              </select>   
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah Cuti</label>
                              <div class="col-sm-4">
                           <input type="text" name="jumlah_cuti" id="jumlah_cuti" class="form-control" required="required">
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status</label>
                              <div class="col-sm-4">
                           <select name="status" id="status" class="form-control" required="required">
                           <option value="">----- Pilih Status -----</option>
                           <option value="TETAP">TETAP</option>
                           <option value="PKWT">PKWT</option>
                           <option value="PKWTT">PKWTT</option>  
                           </select>
                            </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-4">
                            <input name="username" type="text" id="username" class="form-control" placeholder="Username" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">password</label>
                              <div class="col-sm-4">
                            <input name="password" type="text" id="password" class="form-control" placeholder="Password" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Level</label>
                              <div class="col-sm-4">
                           <select name="level" id="level" class="form-control" required="required">
                           <option value="">----- Pilih Status -----</option>
                           <option value="Admin">Admin</option>
                           <option value="Superuser">Superuser</option>
                           <option value="User">username</option>
                           </select>
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                              <div class="col-sm-4">
                            <input name="nama_file" type="file" id="nama_file" class="form-control" placeholder="Password" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="karyawan.php" class="btn btn-sm btn-danger">Batal </a>
                              </div> 
                          </div>
                      </form>
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
