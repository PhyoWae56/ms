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
	
		$sql = "select * from BazarList where BazarID='$id' ";
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
action="BazarList/BazarList_action.php">
		 <legend>Assign Bazar To User  </legend>
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">
	 	<input type='hidden' name='MessID' value="<?php echo $MessID?>">
     	<input type='hidden' name='UserID' value="<?php echo $UserID?>">
	
	
	
        
        
		<div class="control-group">
			<label class="control-label" for="Date">BazarDate</label>
			<div class="controls">
				<input type="date" name='Date' id='Date' value='<?php echo $data->BazarDate?>'class='required'
				>
			</div>
		</div>
		
			<div class="control-group">
			<label class="control-label" for="User">User</label>
			<div class="controls">
				<select id='User' name='User' class="required " >
					<?php
combo_user($data->UserID,$MessID);?>
				</select>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="ExpenseAmount"> ExpenseAmount</label>
			<div class="controls">
				<input type="number" name='ExpenseAmount' id='ExpenseAmount' value='<?php echo $data->ExpenseAmount?>' class='required '>
			</div>
		</div>
	
		
		
		
			  <?php
			      if($UserRole=="manager")  {
			       
			    ?>
	
	
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success" name='aksi'value='<?php echo $aksi?>'>
				<?php echo $aksi?>
				</button>
			</div>
	
		<?php      } else {   ?>
		
		<h4> Only Manager can submit this form</h4>
			<?php   } ?>
	
		
		
		
		
		
		
		
		

		</div>


</form>


</div>