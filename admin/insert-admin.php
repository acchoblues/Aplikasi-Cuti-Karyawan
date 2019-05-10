<?php
$namafolder="../admin/gambar_admin/"; //tempat menyimpan file
/*
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("ecommerce")  or die("Gagal");*/
include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $user_id = $_POST['user_id'];
		$username= $_POST['username'];
		$password1=$_POST['password'];
        $password=sha1($password1);
        $fullname=$_POST['fullname'];
        $no_hp=$_POST['no_hp'];
        $level=$_POST['level'];
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO user (user_id,username,password,fullname,no_hp,level,gambar) VALUES
            ('$user_id','$username','$password','$fullname','$no_hp','$level','$gambar')";
			$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			//echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data berhasil dimasukan!'); window.location = 'admin.php'</script>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}

/*include "../conn.php";
$user_id  = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];

$query = mysql_query("INSERT INTO admin (user_id, username, password, fullname) VALUES ('$user_id', '$username', '$password', '$fullname')");
if ($query){
	echo "<script>alert('Data Admin Berhasil dimasukan!'); window.location = 'admin.php'</script>";	
} else {
	echo "<script>alert('Data Admin Gagal dimasukan!'); window.location = 'admin.php'</script>";	
}*/


?>