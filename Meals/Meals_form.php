<?php
$MessID= $_SESSION['MessID'];
$MessName= $_SESSION['MessName'];
$UserID= $_SESSION['UserID'];
$UserName= $_SESSION['UserName'];
$UserRole=	$_SESSION['UserRole'];


include ('inc/config.php');
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "Update";
		$id = $_GET['id'];
	
		$sql = "select * from MonthlyMealDetails where ID='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "Save";
	}?>


<h5> <?php echo $MessID;?>  <?php echo $MessName;?> <?php echo $UserID;?> <?php echo $UserName;?> <?php echo $UserRole;?>   </h5>

<style type="text/css">#map img {
		max-width: none;
	}
	#map label {
		width: auto;
		display: inline;
	}
	div#map {
		margin: 10px;
		width: 100%;
		height: 300px;
		float: left;
		padding: 10px;
	}
	
</style>

	
	<div class='span8'>	
<form  class="form-horizontal" method="POST" id="form1"  
action="MonthlyMealDetails/MonthlyMealDetails_action.php">
		 <legend>  Monthly Meal Details </legend>
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">
	 	<input type='hidden' name='MessID' value="<?php echo $MessID?>">
     	<input type='hidden' name='UserID' value="<?php echo $UserID?>">
	
		<div class="control-group">
			<label class="control-label" for="Date">Date</label>
			<div class="controls">
				<input type="date" name='Date' id='Date' value='<?php echo $data->Date?>'class='required'
				>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="Breakfast"> Breakfast</label>
			<div class="controls">
				<input type="number" name='Breakfast' id='Breakfast' value='<?php echo $data->Breakfast?>' class='required '>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="Launch">Launch</label>
			<div class="controls">
				<input type="number" name='Launch' id='Launch' value='<?php echo $data->Launch?>' class='required'>
			</div>
		</div>
	<div class="control-group">
			<label class="control-label" for="Dinner">Dinner</label>
			<div class="controls">
				<input type="number" name='Dinner' id='Dinner' value='<?php echo $data->Dinner?>' class='required'>
			</div>
		</div>
		

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success" name='aksi'value='<?php echo $aksi?>'>
				<?php echo $aksi?>
				</button>
			</div>
		</div>


</form>


</div>