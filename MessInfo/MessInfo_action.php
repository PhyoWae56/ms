<?php

include ('../inc/config.php');

$MessName = $_POST['MessName'];
$Address=$_POST['Address'];
$Password = md5(trim($_POST['Password']));
$aksi = $_POST['aksi'];
$id = $_POST['id'];

$UserName = $_POST['UserName'];
$ContactNo = $_POST['ContactNo'];
$Password = md5(trim($_POST['Password']));


// ------------------Check--------------------
$sql = "select  * from  MessInfo  where MessName='$MessName'  ";
$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 0) {
    
//----------------------Insert New Mess-----------------------------------------
$sql = null;
if($aksi == 'Save') {
	$sql = "INSERT INTO MessInfo(MessName,Password,Address)
		VALUES('$MessName', '$Password','$Address')";
}else if($aksi == 'Update') {
    
// 	$sql = "update MessInfo set MessName='$MessName',
// 			Password='$Password',Address='$Address' where MessID='$id'";

}
$result = mysql_query($sql) or die(mysql_error());

//--------------------------------Select MessID------------------------------------



$sql = null;
$sql = "select  * from  MessInfo  where MessName='$MessName'  ";
$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

$MessID=$hasil->MessID;
if(mysql_num_rows($sql_login) == 1) {
    
    
    


$sql = null;
if($aksi == 'Save') 
{
	$sql = "INSERT INTO UserInfo(UserName,Password,UserRole,ContactNo,MessID)
		VALUES('$UserName', '$Password','manager','$ContactNo','$MessID')";
}
else if($aksi == 'Update')
{
// 	$sql = "update UserInfo set UserName='$UserName',
// 			Password='$Password', UserRole='$UserRole',ContactNo='$ContactNo',MessID='$MessID'    where UserID='$id' ";

}

$result = mysql_query($sql) or die(mysql_error());
 echo'<script> window.location="../index.php?mod=MessInfo&pg=MessInfo_view&level=0"; </script> ';
    
    
    
}
    









 
}
 

else {
    echo'<script> window.location="../index.php?mod=MessInfo&pg=MessInfo_view&level=1"; </script> ';
}
?>
