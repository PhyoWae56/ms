<?php

include ('../inc/config.php');
include('../inc/function.php');

$nama=$_POST['nama'];
$no_telp=$_POST['no_telp'];
$alamat=$_POST['alamat'];

$lat=$_POST['lat'];
$lng=$_POST['lng'];
$foto=$_POST['foto'];
$idkabupaten=$_POST['idkabupaten'];
$latlng= explode(",", $idkabupaten);
$idkabupaten=get_idkabupaten($latlng[0],$latlng[1]);
$aksi = $_POST['aksi'];
$id = $_POST['id'];

$lokasi_file = $_FILES['foto']['tmp_name'];
$foto_file = $_FILES['foto']['name'];
$tipe_file = $_FILES['foto']['type'];
$ukuran_file = $_FILES['foto']['size'];
$direktori = "../upload/Police/$foto_file";
$sql = null;
$MAX_FILE_SIZE = 1000000;
//100kb
if($ukuran_file > $MAX_FILE_SIZE) {
	header("Location:../index.php?mod=Police&pg=Police_form&status=1");
	exit();
}
$sql = null;
if($ukuran_file > 0) {
	move_uploaded_file($lokasi_file, $direktori);
}

if($aksi == 'Save') {
	$sql = "INSERT INTO polisi(nama,lat,lng,no_telp,alamat,foto,idkabupaten)
		VALUES('$nama','$lat','$lng',
		'$no_telp','$alamat','$foto_file','$idkabupaten')";
}else if($aksi== 'Update') {
	if(!empty($foto)){
	$sql = "update polisi set nama='$nama',
	lat='$lat',lng='$lng',no_telp='$no_telp' ,alamat='$alamat',
	foto='$foto_file',idkabupaten='$idkabupaten'
	where idpolisi='$id'";
	}else{
		$sql = "update polisi set nama='$nama',
	lat='$lat',lng='$lng',no_telp='$no_telp',alamat='$alamat',
	idkabupaten='$idkabupaten'
	where idpolisi='$id'";
	}
}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
     echo'<script> window.location="../index.php?mod=Police&pg=Police_view&status=0"; </script> ';
	//header('location:../index.php?mod=polisi&pg=polisi_view&status=0');
} else {
     echo'<script> window.location="../index.php?mod=Police&pg=Police_view&status=1"; </script> ';
//	header('location:../index.php?mod=polisi&pg=polisi_view&status=1');
}
?>
