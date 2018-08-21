<?php

include ('../inc/config.php');
$MessID=$_POST['MessID'];
$UserName = $_POST['UserName'];
$Password = md5(trim($_POST['Password']));
$UserRole = $_POST['UserRole'];
$ContactNo = $_POST['ContactNo'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];
$status = $_POST['status'];

$sql = null;
if($aksi == 'Save') 
{
    
    
	$sql = "INSERT INTO UserInfo(UserName,Password,UserRole,ContactNo,MessID)
		VALUES('$UserName', '$Password','$UserRole','$ContactNo','$MessID')";
}
else if($aksi == 'Update')
{
    if($UserRole=='')
    $UserRole='member';
    
	$sql = "update UserInfo set UserName='$UserName',
			Password='$Password', UserRole='$UserRole',ContactNo='$ContactNo',MessID='$MessID'    where UserID='$id' ";

}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
    
    if($status==1)
     echo'<script> window.location="../index.php?mod=login&pg=UserLogin_form&level=0"; </script> ';
    else
    echo'<script> window.location="../index.php?mod=UserInfo&pg=UserInfo_view&level=0"; </script> ';
//	header('location:../index.php?mod=admin&pg=admin_view&level=0');
} else {
    echo'<script> window.location="../index.php?mod=UserInfo&pg=UserInfo_view&level=1"; </script> ';
//	header('location:../index.php?mod=admin&pg=admin_view&level=1');
}
?>
