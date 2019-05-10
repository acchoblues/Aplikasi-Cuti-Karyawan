<?php
include "session.php";
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=cuti-karyawan.xls");
 
																  
											//	$sql = mysqli_query($koneksi, "SELECT * FROM t_inventoryitems WHERE f_partcode='$id'");
		
			?>
	  
 
	<h3>Data Cuti Karyawan</h3>
	  
	<!-- <table>
	
			<tr>
			 <td width="0px">Plant :</td>  <td><?php //echo $plantname ?></td> 
			 <td width="0px">From : <?php //echo date("d-m-Y",strtotime($_GET['date1'])) ?></td>  
			 <td width="0px">Until : <?php //echo date("d-m-Y",strtotime($_GET['date2'])) ?></td> 
			 
		 </tr>
	</table>-->	
    <table>
	
			<tr>
			
			 <td width="0px">Tanggal : <?php echo date("d-m-Y") ?></td>  
			 
			 
		 </tr>
	</table>	
		 
		<table bordered="1">  
			<thead bgcolor="eeeeee" align="center">
			<tr bgcolor="eeeeee" >
               <th>No</th>
               <th>Kode</th>
               <th>NIK</th>
	           <th>Nama</th>
			   <th>Tanggal Awal</th>
			   <th>Tanggal Akhir</th>
               <th>Jumlah</th>
               <th>Jenis Cuti</th>
               <th>Keterangan</th>
			   <th>Status</th>
			  </tr>
			</thead>
			<tbody>
	 	
					
		</tbody>

		</div>
    </div>
</div>
   <?php
	//query menampilkan data
	$sql = mysqli_query($koneksi, "SELECT cuti.*, karyawan.nik, karyawan.nama FROM cuti, karyawan where cuti.nik=karyawan.nik");
	$no = 1;
	while($rowshow = mysqli_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$rowshow['kode'].'</td>
			<td>'.$rowshow['nik'].'</td>
			<td>'.$rowshow['nama'].'</td>
			<td>'.$rowshow['tanggal_awal'].'</td>
			<td>'.$rowshow['tanggal_akhir'].'</td>
            <td>'.$rowshow['jumlah'].'</td>
            <td>'.$rowshow['jenis_cuti'].'</td>
			<td>'.$rowshow['ket'].'</td>
			<td>'.$rowshow['status'].'</td>
		</tr>
		';
		$no++;
	}
	
						
					 ?>
  </table>   