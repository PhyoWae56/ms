<?php

include ('../inc/config.php');
include ('../inc/function.php');


$MessID=$_POST['MessID'];

$UserID=$_POST['UserID'];
$UserName = $_POST['UserName'];
$UserRole=	$_SESSION['UserRole'];

$Date = $_POST['Date'];
$Breakfast=$_POST['Breakfast'];
$Launch=$_POST['Launch'];
$Dinner=$_POST['Dinner'];


$aksi = $_POST['aksi'];
$id = $_POST['id'];
$sql = null;

if($aksi == 'Save')
{
$sql = "INSERT INTO MonthlyMealDetails ( UserID ,Date,Breakfast,Launch,Dinner ,MessID)
		VALUES('$UserID','$Date','$Breakfast','$Launch','$Dinner','$MessID')";
}else if($aksi == 'Update')
{
	$sql = "update MonthlyMealDetails set Date='$Date' ,
	Breakfast='$Breakfast',Launch='$Launch',Dinner='$Dinner',MessID='$MessID'
	where ID='$id'";

}
$result = mysql_query($sql) or die(mysql_error());

if($result) {
     echo'<script> window.location="../index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_view&level=0"; </script> ';
//	header('location:../index.php?mod=Upazilla&pg=Upazilla_view&level=0');
} else {
       echo'<script> window.location="../index.php?mod=MonthlyMealDetail &pg=MonthlyMealDetails_view&level=1"; </script> ';
//	header('location:../index.php?mod=Upazilla&pg=Upazilla_view&level=1');
}

?>
