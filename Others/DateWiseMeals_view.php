

<?php
$MessID= $_SESSION['MessID'];
$MessName= $_SESSION['MessName'];
$UserID= $_SESSION['UserID'];
$UserName= $_SESSION['UserName'];
$UserRole=	$_SESSION['UserRole'];
?>


<h5> <?php echo $MessID;?>  <?php echo $MessName;?> <?php echo $UserID;?> <?php echo $UserName;?> <?php echo $UserRole;?>   </h5>
	<div class='span9'>
	<h2 id="headings">Date Wise Meals</h2>
	
	
	
		<form id='formSearchByMonth' class="form-inline" action='index.php?mod=Others&pg=DateWiseMeals_view' method="POST">
<input type="Month"  style='width:130px' name='Month' id='Month' value='<?php echo  date("Y-m")?>'class='required'>

<input type='submit'  class='btn' value='Search By Month'>
<a href='index.php?mod=Others&pg=DateWiseMeals_view' class="btn" ><i class='icon-list'></i>All</a>

</form>
	
	
	

	



	<table  class="table  table-condensed table-hover">
		<thead>
		<th><td><b>Date</b></td>    <td><b> Total Brakfast</b></td> <td><b> Total Launch</b></td> <td><b>Total Dinner</b></td>  <td><b>Total Meals</b></td>    </th>
		</thead>
		<tbody>
		<?php

	$batas=31;
    $halaman=$_GET['halaman'];
    $posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}


$query="SELECT Date, sum(Breakfast) as Breakfast,sum(Launch) as Launch,sum(Dinner) as Dinner FROM MonthlyMealDetails where MessID='$MessID'  GROUP BY Date


        limit $posisi,$batas ";
	
$sql_page="SELECT Date, sum(Breakfast) as Breakfast,sum(Launch) as Launch,sum(Dinner) as Dinner FROM MonthlyMealDetails where MessID='$MessID'  GROUP BY Date

 ";


    if(isset($_POST['Month']))
    {
        
	$Date=$_POST['Month'];
	$query="SELECT Date, sum(Breakfast) as Breakfast,sum(Launch) as Launch,sum(Dinner) as Dinner FROM MonthlyMealDetails where MessID='$MessID' and  Date like '$Date%' GROUP BY Date ";
	
	 $sql_page=		$query;
    }


	 $TotalMeals=0;

$result=mysql_query($query) or die(mysql_error());
$no=1;

while($rows=mysql_fetch_object($result))
{

		?>
		<tr>
			<td><?php echo  $posisi+$no
			?></td>
			<td><?php	
			
			
	
				$d1=date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($rows ->Date)));
			$d2=date('d-m-Y',strtotime('+0 day',strtotime(	$d1)));
			echo $d2; 	
			
			?>
			
			
			</td>
			
				<td><?php		echo $rows -> Breakfast;?></td>	
				<td><?php		echo $rows -> Launch;?></td>	
				<td><?php		echo $rows -> Dinner;?></td>
				<td><?php	 $TotalMeals= $TotalMeals+ $rows -> Breakfast+ $rows -> Launch+$rows -> Dinner;  	echo   $rows -> Breakfast+$rows -> Launch+$rows -> Dinner;?></td>
				
		</tr>
		<?php
	$no++;
	}?>

        <tr><td></td><td></td>  <td></td> <td></td>  <td> Total:</td>  <td>  <?php echo $TotalMeals ?>    </td> </tr>
		
		</tbody>
	</table>
	  

	
	<?php	
//=============Code for paging====================================

$tampil2=mysql_query($sql_page);
$jmldata=mysql_num_rows($tampil2);
$jumlah_halaman=ceil($jmldata/$batas);

echo "<div class='pagination'> <ul>";
for($i=1;$i<=$jumlah_halaman;$i++) 
echo "<li><a href='index.php?mod=Others&pg=DateWiseMeals_view&halaman=$i'>$i</a></li>";
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

