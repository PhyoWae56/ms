<?php

		//===========CODE DELETE RECORD ================
				require_once ('inc/config.php');
				if(isset($_GET['act'])) {
					$id = $_GET['id'];
					$sql = "delete from UserInfo where UserID='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
?>

<?php
$MessID= $_SESSION['MessID'];
$MessName= $_SESSION['MessName'];
$UserID= $_SESSION['UserID'];
$UserName= $_SESSION['UserName'];
$UserRole=	$_SESSION['UserRole'];
?>

<h5> <?php echo $MessID;?>  <?php echo $MessName;?> <?php echo $UserID;?> <?php echo $UserName;?> <?php echo $UserRole;?>   </h5>

	<h2 id="headings"> Data of User</h2>
	<table  class="table table-condensed table-striped table-hover">
		<thead>
		<th class='info'><td><b>ID</b></td><td><b>User Name</b></td> <td><b>User Role</b></td>  <td><b>Action</b></td></th>
		</thead>
		<tbody>
		<?php
$query="SELECT * from UserInfo where MessID='$MessID'";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><?php echo  $no
			?></td>
			<td><b><?php		echo $rows -> UserID;?><b></td>
			<td><?php		echo $rows ->UserName;?></td>
			<td><?php		echo $rows ->UserRole;?></td>
			<td>
			    
			    
			    
			   <?php if($UserRole=="manager"  )  {
			       
			    ?>
			<a href="index.php?mod=UserInfo&pg=UserInfo_form&id=<?php echo 	$rows -> UserID;?>" class='btn'><i class="icon-pencil"></i></a>
			<a href="index.php?mod=UserInfo&pg=UserInfo_view&act=del&id=<?php echo 	$rows -> UserID;?>"
			onclick="return confirm('Do You want to Delete?') ";
			class='btn'> <i class="icon-trash"></i></a>
			<?php      }    ?>
			
			
			
			
				   <?php if($UserRole!="manager" &&  $UserID== $rows -> UserID )  {
			       
			    ?>
			<a href="index.php?mod=UserInfo&pg=UserInfo_form&id=<?php echo 	$rows -> UserID;?>" class='btn'><i class="icon-pencil"></i></a>
			
			<!--<a href="index.php?mod=UserInfo&pg=UserInfo_view&act=del&id=<?php echo 	$rows -> UserID;?>"-->
			<!--onclick="return confirm('Do You want to Delete?') ";-->
			<!--class='btn'> <i class="icon-trash"></i></a>-->
			<?php      }    ?>
			
			
			
			
               
               
			</td>
		</tr>
		<?php
	$no++;
	}?>

 <?php if($UserRole=="manager")  {
			       
			    ?>

		<tr>
			<td colspan=3 ></td><td><a href="index.php?mod=UserInfo&pg=UserInfo_form"
			class='btn'	><i class="icon-plus"></i>Create New User</a></td>
		</tr>
		
		<?php      }    ?>
		</tbody>
	</table>
	<?php
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}


//close database	?>


