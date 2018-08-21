<?php

include ('../inc/config.php');
include ('../inc/function.php');


$MessID=$_POST['MessID'];

$UserID=$_POST['UserID'];
$UserName = $_POST['UserName'];
$UserRole=	$_SESSION['UserRole'];

$Date = $_POST['Date'];
$User = $_POST['User'];
$ExpenseAmount=$_POST['ExpenseAmount'];



$aksi = $_POST['aksi'];
$id = $_POST['id'];
$sql = null;

if($aksi == 'Save')
{
$sql = "INSERT INTO BazarList ( UserID ,BazarDate,ExpenseAmount,MessID)
		VALUES('$User','$Date','$ExpenseAmount','$MessID')";
}else if($aksi == 'Update')
{
	$sql = "update BazarList set UserID='$User', BazarDate='$Date' ,
	ExpenseAmount='$ExpenseAmount'
	where BazarID='$id'";

}
$result = mysql_query($sql) or die(mysql_error());

if($result) {
     echo'<script> window.location="../index.php?mod=BazarList&pg=BazarList_view&level=0"; </script> ';
//	header('location:../index.php?mod=Upazilla&pg=Upazilla_view&level=0');
} else {
       echo'<script> window.location="../index.php?mod=BazarList &pg=BazarList_view&level=1"; </script> ';
//	header('location:../index.php?mod=Upazilla&pg=Upazilla_view&level=1');
}

?>
