<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $_SESSION['gambar']; ?>" height="200" width="200" style="border: 2px solid white;" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nama']; ?></p>
              <a href="index.php"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['departemen']; ?></a>
            </div>
          </div><br />
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">ANNUAL LEAVE APPLICATION</li>
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-user"></i> <span>Karyawan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="karyawan.php"><i class="fa fa-circle-o"></i> Karyawan</a></li>
                <li><a href="input-karyawan.php"><i class="fa fa-circle-o"></i> Input Karyawan</a></li>
                <li><a href="karyawan_importxls.php"><i class="fa fa-circle-o"></i> Import Data Excel</a></li>
              </ul>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-building"></i> <span>Departemen</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="departemen.php"><i class="fa fa-circle-o"></i> Data Departemen</a></li>
                <li><a href="input-departemen.php"><i class="fa fa-circle-o"></i> Input Departemen</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-building"></i> <span>Jabatan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="jabatan.php"><i class="fa fa-circle-o"></i> Data Jabatan</a></li>
                <li><a href="input-jabatan.php"><i class="fa fa-circle-o"></i> Input Jabatan</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dollar"></i> <span>Variabel Cuti</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="jenis.php"><i class="fa fa-circle-o"></i> Data Variabel </a></li>
                <li><a href="input-jenis.php"><i class="fa fa-circle-o"></i> Input Variabel </a></li>
              </ul>
            </li>
            
            
            <?php 
            $tampil=mysqli_query($koneksi, "select * from cuti order by kode desc");
                        $total=mysqli_num_rows($tampil);
                    ?>
            <li>
              <a href="#">
                <i class="fa fa-lock"></i> <span>Cuti</span>
                <small class="label pull-right bg-yellow"><?php echo $total; ?></small>
              </a>
               <ul class="treeview-menu">
               <li><a href="cuti.php"><i class="fa fa-circle-o"></i> Data Cuti</a></li>
                <li><a href="input-cuti.php"><i class="fa fa-circle-o"></i> Input Cuti </a></li>
              </ul>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-file"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="404.php"><i class="fa fa-circle-o"></i> Laporan Cuti</a></li>
                <li><a href="404.php"><i class="fa fa-circle-o"></i> Laporan Detail Cuti</a></li>
                <li><a href="404.php"><i class="fa fa-circle-o"></i> Laporan Balance Cuti</a></li>
                <li><a href="404.php" target="_blank"><i class="fa fa-circle-o"></i> Cetak Karyawan</a></li>
              </ul>
            </li>
        </section>
        <!-- /.sidebar -->
      </aside>