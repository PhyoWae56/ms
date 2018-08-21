<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
require_once ('../inc/config.php');

$MessName=$_POST['MessName'];
$UserName=$_POST['UserName'];
$Password = md5(trim($_POST['Password']));


$sql = "update MessInfo set password='$Password' where MessName='$MessName'";

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if ($result) {
        echo'<script> window.location="../index.php?mod=login&pg=cp_form&status=0"; </script> ';
//	header('location:../index.php?mod=login&pg=cp_form&status=0');
} else {
    echo'<script> window.location="../index.php?mod=login&pg=cp_form&status=1"; </script> ';
//	header('location:../index.php?mod=login&pg=cp_form&status=1');
}

?>
