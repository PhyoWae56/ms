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
$CurDate=date('d-m-y',strtotime('+0 day',strtotime(	$cenvertedTime2)));

?>









<h5> <?php echo $MessID;?>  <?php echo $MessName;?> <?php echo $UserID;?> <?php echo $UserName;?> <?php echo $UserRole;?>   </h5>
	<div class='span5'>
	
	<!-------------------------form------------------------------>
<form  class="form-horizontal" method="POST" id="form_CurrDate"  
action="Meals/Meals_action.php">
    
     
<div class="control-group">
<label class="control-label" for="Date"> Today :  	<?php  echo  $CurDate  ?>    </label>

			
			
			
	
			
			
			
		</div>
		
	</form>



<form id='formSearchByDate' action='index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_view' method="POST">
<input type="date" name='Date' id='Date' value='<?php echo $data->Date?>'class='required'>
<input type='submit'  class='btn' value='Searc By Date'>
<a href='index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_view' class="btn" ><i class='icon-list'></i>All</a>
</form>
	
	
	<form id='form1' action='index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_view' method="POST">
	<input type='text'  name='qcari' class="required" >
	<input type='submit'  class='btn' value='search By User'>
	 <a href='index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_view' class="btn" ><i class='icon-list'></i>All</a>
</form>


	<table  class="table  table-condensed table-hover">
		<thead>
		<th><td><b>Date</b></td>  <td><b>UserName</b></td>  <td><b>Brakfast</b></td> <td><b>Launch</b></td> <td><b>Dinner</b></td>   <td><b>Action</b></td></th>
		</thead>
		<tbody>
		<?php

	$batas=5000;
    $halaman=$_GET['halaman'];
    $posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}

$query="SELECT M.ID,U.UserID,M.Date,U.UserName,M.Breakfast,M.Launch,M.Dinner
        FROM  MonthlyMealDetails as M,UserInfo as U
        where M.UserID=U.UserID and M.MessID=U.MessID and M.MessID='$MessID'
        and M.Date ='$cenvertedTime2' order by U.UserID asc 
        limit $posisi,$batas ";
	
$sql_page="SELECT M.ID,U.UserID,M.Date,U.UserName,M.Breakfast,M.Launch,M.Dinner
        FROM  MonthlyMealDetails as M,UserInfo as U
        where M.UserID=U.UserID and M.MessID=U.MessID and M.MessID='$MessID'
        and M.Date ='$cenvertedTime2' order by U.UserID asc ";	


if(isset($_POST['qcari']))
{
	$qcari=$_POST['qcari'];
	$query="SELECT M.ID, U.UserID,M.Date,U.UserName,M.Breakfast,M.Launch,M.Dinner
    FROM  MonthlyMealDetails as M,UserInfo as U
  	where M.UserID=U.UserID and    M.MessID='$MessID' and U.UserName like '%$qcari%' order by M.Date asc";
	
	 $sql_page=		$query;
}

if(isset($_POST['Date']))
{
	$Date=$_POST['Date'];
	$query="SELECT M.ID,U.UserID, M.Date,U.UserName,M.Breakfast,M.Launch,M.Dinner
    FROM  MonthlyMealDetails as M,UserInfo as U
  	where M.UserID=U.UserID and    M.MessID='$MessID'  and M.Date   like '%$Date%' order by M.Date asc";
	
	 $sql_page=		$query;
}



$result=mysql_query($query) or die(mysql_error());
$no=1;
$TotalBreakfast=0.00;
$totalLaunch=0.00;
$TotalDinner=0.00;

while($rows=mysql_fetch_object($result))
{


$TotalBreakfast=$TotalBreakfast+$rows -> Breakfast;
$TotalLaunch=$TotalLaunch+ $rows -> Launch;
$TotalDinner=$TotalDinner+$rows -> Dinner;
		?>
		<tr>
			<td><?php echo  $posisi+$no
			?></td>
			<td><?php	 
			
			
			
			
			$d1=date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($rows ->Date)));
			$d2=date('d-m-Y',strtotime('+0 day',strtotime(	$d1)));
			echo $d2; 
			  
			  
$startTime = date("Y-m-d H:i:s");
$cenvertedTime = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($startTime)));
$cenvertedTime2 = date('Y-m-d',strtotime('+0 day',strtotime($cenvertedTime)));

			
			?></td>
				<td><?php		echo $rows -> UserName;?></td>
				<td><?php		echo $rows -> Breakfast;?></td>	
				<td><?php		echo $rows -> Launch;?></td>	
				<td><?php		echo $rows -> Dinner;?></td>
				
			<td>
	
  <?php           
			      if($UserID==$rows->UserID &&$UserRole!="manager"           )  {
			       
			     
			    
			       if( $rows ->Date >$cenvertedTime2  ){
			    ?>
					<a href="index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_form&id=<?php echo 	$rows -> ID;?>"

				class='btn'> <i class="icon-pencil"></i></a>
					<?php   }   }    ?>
					
					
				<?php
			      if($UserRole=="manager")  {
			       
			    ?>
			    	<a href="index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_form&id=<?php echo 	$rows -> ID;?>"

				class='btn'> <i class="icon-pencil"></i></a>
				<a href="index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_view&act=del&id=<?php echo 	$rows -> ID;?>"
				onclick="return confirm('Data has been deleted Successfully?') ";
				class='btn'> <i class="icon-trash"></i></a></td>
	<?php      }    ?>
	
		
		</tr>
		<?php
	$no++;
	}?>
	
	<tr>
	 <td>	</td> <td>	</td>	<td>Total Meals	</td>   <td><?php  echo $TotalBreakfast   ?> </td> 
		<td> <?php echo $TotalLaunch   ?> </td>  
			<td> <?php echo $TotalDinner  ?> </td> 
		</tr>

	<?php  if($UserRole=="manager")  {    ?>
		<tr>
			<td colspan=3></td><td><a href="index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_form"
			class='btn'	><i class="icon-plus"></i></a></td>
		</tr>
			<?php      }    ?>
		
		
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

