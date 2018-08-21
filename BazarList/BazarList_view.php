<?php

				require_once ('inc/config.php');
				if(isset($_GET['act'])) {
					$id = $_GET['id'];
					$sql = "delete from BazarList  where BazarID='$id' ";
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
	<div class='span5'>
	<h2 id="headings"> Bazar List</h2>
	<form id='form1' action='index.php?mod=BazarList&pg=BazarList_view' method="POST">
	<input type='text'  name='qcari' class="required" >
	<input type='submit'  class='btn' value='search'>
	
	
	
	
	
	 <a href='index.php?mod=BazarList&pg=BazarList_view' class="btn" ><i class='icon-list'></i>All</a>
</form>


	<table  class="table  table-condensed table-hover">
		<thead>
		<th><td><b>Bazar Date</b></td>  <td><b>UserName</b></td>  <td><b>Expense Amount</b></td>    <td><b>Action</b></td></th>
		</thead>
		<tbody>
		<?php

	$batas=30;
    $halaman=$_GET['halaman'];
    $posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}

$query="SELECT B.BazarID, B.BazarDate,U.UserName,B.ExpenseAmount
    FROM  BazarList as B,UserInfo as U
  	where B.UserID=U.UserID  and B.MessID=U.MessID and B.MessID='$MessID'    order by B.BazarDate asc
        limit $posisi,$batas ";
	
$sql_page="SELECT B.BazarID, B.BazarDate,U.UserName,B.ExpenseAmount
    FROM  BazarList as B,UserInfo as U
  	where B.UserID=U.UserID  and B.MessID=U.MessID and B.MessID='$MessID'    order by B.BazarDate asc
         ";


if(isset($_POST['qcari']))
{
	$qcari=$_POST['qcari'];
	$query="SELECT B.BazarID, B.BazarDate,U.UserName,B.ExpenseAmount
    FROM  BazarList as B,UserInfo as U
  	where B.UserID=U.UserID  and B.MessID=U.MessID and B.MessID='$MessID'  and U.UserName like '%$qcari%' order by B.BazarDate desc";
	 $sql_page=		$query;
}


$result=mysql_query($query) or die(mysql_error());
$no=1;

while($rows=mysql_fetch_object($result))
{

		?>
		<tr>
			<td><?php echo  $posisi+$no
			?></td>
			<td><?php
			
			
			$d1=date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($rows ->BazarDate)));
			$d2=date('d-m-Y',strtotime('+0 day',strtotime(	$d1)));
			echo $d2; 		?>
			
			</td>
				<td><?php		echo $rows -> UserName;?></td>
				<td><?php		echo $rows -> ExpenseAmount;?></td>	
			
				
			<td>
			    
			      <?php
			      if($UserRole=="manager")  {
			       
			    ?>
	

					<a href="index.php?mod=BazarList&pg=BazarList_form&id=<?php echo 	$rows -> BazarID;?>"

				class='btn'> <i class="icon-pencil"></i></a>
				<a href="index.php?mod=BazarList&pg=BazarList_view&act=del&id=<?php echo 	$rows -> BazarID;?>"
				onclick="return confirm('Data has been deleted Successfully?') ";
				class='btn'> <i class="icon-trash"></i></a></td>
	     	<?php      }    ?>
	
		
		</tr>
		<?php
	$no++;
	}?>

		<tr>
			<td colspan=3></td><td><a href="index.php?mod=BazarList&pg=BazarList_form"
			class='btn'	><i class="icon-plus"></i></a></td>
		</tr>
		</tbody>
	</table>
	<?php	
//=============Code for paging====================================

$tampil2=mysql_query($sql_page);
$jmldata=mysql_num_rows($tampil2);
$jumlah_halaman=ceil($jmldata/$batas);

echo "<div class='pagination'> <ul>";
for($i=1;$i<=$jumlah_halaman;$i++) 
echo "<li><a href='index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_view&halaman=$i'>$i</a></li>";
?>
</ul>
</div>

<div class='well'>Total data :<strong><?php echo $jmldata;?> </strong></div>
	<?php

if(isset($_GET['status'])) 
{
	if($_GET['status'] == 0) {
		echo " Data Saved Succesfully";
	} else {
		echo "Failed";
	}
}


//close database	?>
</div>

