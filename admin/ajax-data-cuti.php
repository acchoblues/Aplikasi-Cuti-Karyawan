<?php
/* Database connection start */
include "koneksi.php";
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'kode',
    1 => 'nik', 
	2 => 'tanggal_awal',
	3 => 'tanggal_akhir',
	4 => 'jumlah',
	5 => 'jenis_cuti',
    6 => 'ket',
    7 => 'status'
);

// getting total number records without any search
$sql = "SELECT kode, nik, tanggal_awal, tanggal_akhir, jumlah, jenis_cuti, ket, status";
$sql.=" FROM cuti";
$query=mysqli_query($conn, $sql) or die("ajaxin-data-cuti.php: get Cuti");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT kode, nik, tanggal_awal, tanggal_akhir, jumlah, jenis_cuti, ket, status";
	$sql.=" FROM cuti";
	$sql.=" WHERE kode LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nik LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tanggal_awal LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tanggal_akhir LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR jumlah LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR jenis_cuti LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR ket LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR status LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-data-cuti.php: get Cuti");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-data-cuti.php: get Cuti"); // again run query with limit
	
} else {	

	$sql = "SELECT kode, nik, tanggal_awal, tanggal_akhir, jumlah, jenis_cuti, ket, status";
	$sql.=" FROM cuti";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajaxin-grid-data.php: get Karyawan");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["kode"];
    $nestedData[] = $row["nik"];
    $nestedData[] = $row["tanggal_awal"];
    $nestedData[] = $row["tanggal_akhir"];
	$nestedData[] = $row["jumlah"];
	$nestedData[] = $row["jenis_cuti"];
	$nestedData[] = $row["ket"];
	$nestedData[] = $row["status"];
    $nestedData[] = '<td><center>
                     <a href="detail-cuti.php?id='.$row['kode'].'"  data-toggle="tooltip" title="View Detail" class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-search"></i> </a>
                     <a href="edit-cuti.php?id='.$row['kode'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
				     <a href="cuti.php?aksi=delete&id='.$row['kode'].'&nik='.$row['nik'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nik'].'?\')" class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>
	                 </center></td>';		
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
