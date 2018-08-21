<?php
session_start();
include ('../inc/config.php');



$MessName = $_POST['MessName'];
$UserName = $_POST['UserName'];
$Password = md5(trim($_POST['Password']));




$sql = "select M.MessID,M.MessName, U.UserName,U.UserID,U.UserRole from  MessInfo M join UserInfo U where U.MessID=M.MessID and   MessName='$MessName' and UserName='$UserName' and U.Password='$Password'
  ";

$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);




if(mysql_num_rows($sql_login) == 1)
{
  
  
        
        	$_SESSION['MessName'] =$hasil->MessName;
            $_SESSION['MessID'] =$hasil->MessID; 
            $_SESSION['UserID']=$hasil->UserID;
            $_SESSION['UserName']=$hasil->UserName;
            $_SESSION['UserRole']=$hasil->UserRole;

	
        echo'<script> window.location="../index.php?mod=UserInfo&pg=UserInfo_view"; </script> ';
    
}
 
  
    else {
   
   echo'<script> window.location="../index.php?mod=login&pg=MessAndUserLogin_form&s=1"; </script> ';
    }
?>

