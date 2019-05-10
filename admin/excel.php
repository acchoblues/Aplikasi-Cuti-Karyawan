<?php
		 			 
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=perserta-nutanix.xls");
 
// Tampilkan isi table
//include "excel-anggota.php";	
 ?>	
 
 <?php include "../conn.php"; ?>
	  
 
	<h3>Data Peserta</h3>
	  
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
	           <th>Tanggal Daftar</th>
			   <th>No Anggota</th>
			   <th>Nama</th>
               <th>Perusahaan</th>
               <th>No Telp</th>
               <th>Email</th>
			  </tr>
			</thead>
			<tbody>
	 	
					
		</tbody>

		</div>
    </div>
</div>
   <?php
	
	//query menampilkan data
	$sql = mysqli_query($koneksi, "SELECT anggota.*, event.* FROM anggota, event WHERE anggota.no_anggota=event.no_anggota ORDER BY event.tanggal ASC");
	$no = 1;
	while($rowshow = mysqli_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$rowshow['tanggal'].'</td>
			<td>'.$rowshow['no_anggota'].'</td>
			<td>'.$rowshow['nama'].'</td>
			<td>'.$rowshow['nama_pt'].'</td>
			<td>'.$rowshow['no_hp'].'</td>
			<td>'.$rowshow['email'].'</td>
           
		</tr>
		';
		$no++;
	}
	
						
					 ?>
  </table>   					 
			
 
   