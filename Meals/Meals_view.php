<?php

				require_once ('inc/config.php');
				if(isset($_GET['act'])) {
					$id = $_GET['id'];
					$sql = "delete from MonthlyMealDetails  where ID='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
?>



<?php
$MessID= $_SESSION['MessID'];
$MessName= $_SESSION['MessName'];
$UserID= $_SESSION['UserID'];
$UserName= $_SESSION['UserName'];
$UserRole=	$_SESSION['UserRole'];

$startTime = date("Y-m-d H:i:s");
$cenvertedTime = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($startTime)));
$cenvertedTime2 = date('Y-m-d',strtotime('+0 day',strtotime($cenvertedTime)));
?>


<h5> <?php echo $MessID;?>  <?php echo $MessName;?> <?php echo $UserID;?> <?php echo $UserName;?> <?php echo $UserRole;?>   </h5>
	<div class='span5'>
	<h5 id="headings"> Assign meals to all user for this date below</h5>
	








<!-------------------------form------------------------------>
<form  class="form-horizontal" method="POST" id="form1"  
action="Meals/Meals_action.php">
    
     
		<div class="control-group">
			<label class="control-label" for="Date">Date</label>
			<div class="controls">
				<input type="date" name='Date' id='Date' value='<?php echo $data->Date?>'class='required'
				>
			</div>
		</div>
		
    	<input type='hidden' name='MessID' value="<?php echo $MessID?>">
     	<input type='hidden' name='UserID' value="<?php echo $UserID?>">
    	
	<table  class="table  table-condensed table-hover">
		<thead>
		<th>   <td><b>UserName</b></td>  <td><b>Breakfast</b></td> <td><b>Launch</b></td> <td><b>Dinner</b></td>   </th>
		</thead>
		<tbody>
		<?php

	$batas=100;
    $halaman=$_GET['halaman'];
    $posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}

$query="SELECT * from UserInfo where MessID='$MessID' order by UserName desc
         ";
	
$sql_page=$query;	


if(isset($_POST['qcari']))
{
	$qcari=$_POST['qcari'];
	$query="SELECT * from UserInfo where  UserName like '%$qcari%' order by UserName desc";
	
	 $sql_page=		$query;
}


$result=mysql_query($query) or die(mysql_error());
$no=1;

$TotalBreakfast=0;
$TotalLaunch=0;
$TotalDinner=0;


while($rows=mysql_fetch_object($result))
{   

		?>
		<tr>
			
    	<td> <?php echo  $posisi+$no
			?>	<input type='hidden' style='width:60px'  name='User[]' value="<?php	echo $rows ->UserID;?>"  readonly class="required" >  </td>
		<td><?php		echo $rows -> UserName;?></td>
    	<td>  	<input type='number' style='width:60px'  name='Breakfast[]' value="<?php		echo 0.5;?>"  class="required" >        </td>
		<td>  	<input type='number' style='width:60px' name='Launch[]' value="<?php		echo 1.00;?>"  class="required" >        </td>	
     	<td>  	<input type='number' style='width:60px' name='Dinner[]' value="<?php		echo 1.00;?>"  class="required" >        </td>	
				
				
	
	
	
		</tr>
		
		<?php
	$no++;
	}?>

	
		</tbody>
	</table>
	
	
	
	  <?php
			      if($UserRole=="manager")  {
			       
			    ?>
	
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success" name='aksi'value='Submit'>
				Submit
				</button>
			</div>
		</div>
	
		<?php      } else {   ?>
		
		<h4> Only Manager can submit this form</h4>
			<?php   } ?>
	
	
	
	
	</form>
	
	
	
	
	
	
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

