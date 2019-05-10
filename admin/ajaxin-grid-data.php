<?php
/* Database connection start */
include "koneksi.php";
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'kd_produk',
    1 => 'nama_produk', 
	2 => 'qty',
	3 => 'unit',
    4 => 'harga_beli',
    5 => 'harga_jual'
);

// getting total number records without any search
$sql = "SELECT kd_produk, nama_produk, qty, unit, harga_beli, harga_jual";
$sql.=" FROM produk";
$query=mysqli_query($conn, $sql) or die("ajaxin-grid-data.php: get Produk");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT kd_produk, nama_produk, qty, unit, harga_beli, harga_jual";
	$sql.=" FROM produk";
	$sql.=" WHERE kd_produk LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nama_produk LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR qty LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR unit LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR harga_beli LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR harga_jual LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get Produk");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajaxin-grid-data.php: get Produk"); // again run query with limit
	
} else {	

	$sql = "SELECT kd_produk, nama_produk, qty, unit, harga_beli, harga_jual";
	$sql.=" FROM produk";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajaxin-grid-data.php: get Produk");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["kd_produk"];
    $nestedData[] = $row["nama_produk"];
	$nestedData[] = $row["qty"];
	$nestedData[] = $row["unit"];
    $nestedData[] = number_format($row['harga_beli'],0,",",".");
    $nestedData[] = number_format($row['harga_jual'],0,",",".");
    $nestedData[] = '<td><center>
                     <a href="cetak-barcode.php?id='.$row['kd_produk'].'"  data-toggle="tooltip" title="Cetak Barcode" class="btn btn-sm btn-info"> <i class="glyphicon glyphicon-print"></i> </a>
                     <a href="detail-produk.php?id='.$row['kd_produk'].'"  data-toggle="tooltip" title="View Detail" class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-search"></i> </a>
                     <a href="edit-produk.php?id='.$row['kd_produk'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
				     <a href="produk.php?aksi=delete&id='.$row['kd_produk'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama_produk'].'?\')" class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>
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
