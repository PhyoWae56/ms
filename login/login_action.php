<?php
session_start();
include ('../inc/config.php');

$Messname = $_POST['MessName'];
$Password = md5(trim($_POST['Password']));

$sql = "select * from  MessInfo  where MessName='$Messname'
  and Password='$Password' ";

$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 1) {
	$_SESSION['MessName'] = $Messname;
    $_SESSION['MessID'] =$hasil->MessID; 
	



 echo'<script> window.location="../index.php?mod=login&pg=UserLogin_form"; </script> ';
} else {
   
   echo'<script> window.location="../index.php?mod=login&pg=form_login&s=1"; </script> ';
//header("Location:../index.php?mod=login&pg=form_login&s=1");
}?>

