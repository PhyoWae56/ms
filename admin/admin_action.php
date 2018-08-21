<?php

include ('../inc/config.php');

$username = $_POST['username'];
$password = md5(trim($_POST['password']));
$aksi = $_POST['aksi'];
$id = $_POST['id'];

$sql = null;
if($aksi == 'tambah') {
	$sql = "INSERT INTO admin(username,password)
		VALUES('$username', '$password')";
}else if($aksi == 'edit') {
	$sql = "update admin set username='$username',
			password='$password' where idadmin='$id'";

}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
    echo'<script> window.location="../index.php?mod=admin&pg=admin_view&level=0"; </script> ';
//	header('location:../index.php?mod=admin&pg=admin_view&level=0');
} else {
    echo'<script> window.location="../index.php?mod=admin&pg=admin_view&level=1"; </script> ';
//	header('location:../index.php?mod=admin&pg=admin_view&level=1');
}
?>
