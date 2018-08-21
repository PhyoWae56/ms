

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
	
	
	
		<form id='formSearchByMonth' class="form-inline" action='index.php?mod=Others&pg=MealRateMonthWise' method="POST">
<input type="Month"  style='width:130px' name='Month' id='Month' value='<?php echo  date("Y-m")?>'class='required'>

<input type='submit'  class='btn' value='Search By Month'>
<a href='index.php?mod=Others&pg=MealRateMonthWise' class="btn" ><i class='icon-list'></i>All</a>

</form>
	
	
	

	



	<table  class="table  table-condensed table-hover">
		<thead>
		<th><td><b>Date</b></td>    <td><b> Total Meals</b></td> <td><b> Total Expense</b></td> <td><b> Meal Rate</b></td>     </th>
		</thead>
		<tbody>
		<?php

	$batas=5;
    $halaman=$_GET['halaman'];
    $posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}



$startTime = date("Y-m-d H:i:s");
$cenvertedTime = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($startTime)));
$cenvertedTime2 = date('Y-m-d',strtotime('+0 day',strtotime($cenvertedTime)));


	
$sql_page=$query;	

$TotalMeal=0;
$TotalBazar=0;
$MealRate=0;

    if(isset($_POST['Month']))
    {
        
	$Date=$_POST['Month'];
	
  $sql = null;
$sql = "select  sum(Breakfast+Launch+Dinner) as TotalMeal from  MonthlyMealDetails  where   Date<='$cenvertedTime' and Date like '$Date%' and MessID='$MessID'  ";
$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 1) {
    $TotalMeal=$hasil->TotalMeal;
    
}


$startTime = date("Y-m-d H:i:s");
$cenvertedTime = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($startTime)));
$cenvertedTime2 = date('m-Y',strtotime('+0 day',strtotime($cenvertedTime)));

$sql = null;	
$sql = "select  sum(ExpenseAmount) as TotalBazar from  BazarList  where   BazarDate<='$cenvertedTime' and BazarDate like '$Date%' and MessID='$MessID'  ";
$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 1) {
    $TotalBazar=$hasil->TotalBazar;
    
}

	
	if($TotalMeal!=0)
  $MealRate= $TotalBazar/$TotalMeal;
  else
   $MealRate=0;

	
	
	
	 $sql_page=		$query;
    }
    else
    
    {
        
        
        
$startTime = date("Y-m-d H:i:s");
$cenvertedTime = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($startTime)));
$cenvertedTime2 = date('Y-m',strtotime('+0 day',strtotime($cenvertedTime)));

        
$Date=$cenvertedTime2 ;
$query=null;
$query="select *    from MonthlyMealDetails where  Date<='$cenvertedTime2' and Date like '$Date%' and MessID='$MessID' ";
$result=mysql_query($query) or die(mysql_error());
	
	
	
$sql = null;
$sql = "select  sum(Breakfast+Launch+Dinner) as TotalMeal from  MonthlyMealDetails  where   Date<='$cenvertedTime' and Date like '$Date%' and MessID='$MessID'  ";
$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 1) {
    $TotalMeal=$hasil->TotalMeal;
    
}


$startTime = date("Y-m-d H:i:s");
$cenvertedTime = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($startTime)));
$cenvertedTime2 = date('m-Y',strtotime('+0 day',strtotime($cenvertedTime)));

$sql = null;	
$sql = "select  sum(ExpenseAmount) as TotalBazar from  BazarList  where   BazarDate<='$cenvertedTime' and BazarDate like '$Date%' and MessID='$MessID'  ";
$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 1) {
    $TotalBazar=$hasil->TotalBazar;
    
}


	
	if($TotalMeal!=0)
  $MealRate= $TotalBazar/$TotalMeal;
  else
   $MealRate=0;



	
	
	
	 $sql_page=		$query;
        
        
    
    }
    



$no=1;

		?>
		<tr>
			<td><?php echo  $posisi+$no
			?></td>
			<td><?php	  echo   $cenvertedTime2; ?></td>
			  <td><?php		echo  $TotalMeal;?></td>	
				<td><?php		echo $TotalBazar;?></td>	
				<td><?php		echo $MealRate;?></td>	
			
			
		</tr>
		<?php
	$no++;
	?>


		
		</tbody>
	</table>
	  

	
	<?php	
//=============Code for paging====================================

$tampil2=mysql_query($sql_page);
$jmldata=mysql_num_rows($tampil2);
$jumlah_halaman=ceil($jmldata/$batas);

echo "<div class='pagination'> <ul>";
for($i=1;$i<=$jumlah_halaman;$i++) 
echo "<li><a href='index.php?mod=Others&pg=MealRateMonthWise&halaman=$i'>$i</a></li>";
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

