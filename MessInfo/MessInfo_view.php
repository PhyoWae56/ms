<?php

		//===========CODE DELETE RECORD ================
				require_once ('inc/config.php');
				if(isset($_GET['act'])) {
					$id = $_GET['id'];
					$sql = "delete from MessInfo where MessID='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
?>



            <h2>
            <a href="index.php?mod=login&pg=MessAndUserLogin_form" class='btn'><i class="icon-user icon-white"></i>Login </a>
            </h2>

           <h2>   <a href="index.php?mod=MessInfo&pg=MessInfo_form"
			class='btn'	><i></i>Create New Mess</a>  
           </h2>

			
			
			
   		
			
	<h4 id="headings"> Mess already registered</h4>
	
	<table  class="table table-condensed table-striped table-hover">
		<thead>
		<th class='info'><td><b>ID</b></td><td><b>Mess Name</b></td></th>
		</thead>
		<tbody>
		<?php
$query="SELECT * from MessInfo";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><?php echo  $no
			?></td>
			<td><b><?php		echo $rows -> MessID;?><b></td>
			<td><?php		echo $rows ->MessName;?></td>
			
			
			<!--<td><a href="index.php?mod=MessInfo&pg=MessInfo_form&id=<?php echo 	$rows -> MessID;?>" class='btn'><i class="icon-pencil"></i></a><a href="index.php?mod=MessInfo&pg=MessInfo_view&act=del&id=<?php echo 	$rows -> MessID;?>"-->
			<!--onclick="return confirm('Do You want to Delete?') ";-->
			<!--class='btn'> <i class="icon-trash"></i></a></td>-->
			
		</tr>
		<?php
	$no++;
	}?>

		<tr>
			<td colspan=2 ></td ><td><a href="index.php?mod=MessInfo&pg=MessInfo_form"
			class='btn'	><i class="icon-plus"></i>Create New Mess</a></td>
		</tr>
		
		</tbody>
	</table>
	<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}


//close database	?>


