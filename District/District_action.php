<?php

include ('../inc/config.php');

$nama = $_POST['nama'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];
$sql = null;
if($aksi == 'Save') {
	$sql = "INSERT INTO provinsi(nama,lat,lng)
		VALUES('$nama','$lat','$lng')";
}else if($aksi == 'Update') {
	$sql = "update provinsi set nama='$nama',
		lat='$lat',lng='$lng' where idprovinsi='$id'";
}
$result = mysql_query($sql) or die(mysql_error());

if($result) {
       echo'<script> window.location="../index.php?mod=District&pg=District_view&level=0"; </script> ';
//	header('location:../index.php?mod=provinsi&pg=provinsi_view&level=0');
} else {
           echo'<script> window.location="../index.php?mod=District&pg=District_view&level=1"; </script> ';
//	header('location:../index.php?mod=provinsi&pg=provinsi_view&level=1');
}

?>
