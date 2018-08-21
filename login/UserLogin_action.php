
<?php
session_start();
include ('../inc/config.php');
$Username = $_POST['username'];
$MessID=$_POST['MessID'];
$Password = md5(trim($_POST['password']));
$sql = "select  * from  UserInfo  where UserName='$Username' 
and Password='$Password' and MessID='$MessID' ";


$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 1) {
    
	$_SESSION['UserName'] = $Username;
	$_SESSION['UserRole']=	$hasil ->UserRole;
	$_SESSION['UserID']=	$hasil ->UserID;

 echo'<script> window.location="../index.php?mod=UserInfo&pg=UserInfo_view"; </script> ';
} else {
   echo'<script> window.location="../index.php?mod=login&pg=UserLogin_form&s=1"; </script> ';
//header("Location:../index.php?mod=login&pg=form_login&s=1");
}?>

