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






$status = '';

if (is_array($_POST['Breakfast'])) {
 $i=0;
foreach($_POST['Breakfast'] as $Breakfast){
    
    $User=$_POST['User'][$i];
   
    $Breakfast=$_POST['Breakfast'][$i];
    $Launch=$_POST['Launch'][$i];
    $Dinner=$_POST['Dinner'][$i];
    
    
    $sql = "INSERT INTO MonthlyMealDetails ( UserID ,Date,Breakfast,Launch,Dinner ,MessID)
		VALUES('$User','$Date','$Breakfast','$Launch','$Dinner','$MessID')";
		
		$result = mysql_query($sql) or die(mysql_error());
		
  $i=$i+1;
echo $i;
   } 
   
  } 

if($id!=0) {
     echo'<script> window.location="../index.php?mod=Meals&pg=Meals_view&level=0"; </script> ';
//	header('location:../index.php?mod=Upazilla&pg=Upazilla_view&level=0');
} else {
      echo'<script> window.location="../index.php?mod=Meals&pg=Meals_view&level=1"; </script>"; </script> ';
//	header('location:../index.php?mod=Upazilla&pg=Upazilla_view&level=1');
}

?>
