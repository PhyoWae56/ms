<?php
$MessID= $_SESSION['MessID'];
$MessName= $_SESSION['MessName'];
$UserID= $_SESSION['UserID'];
$UserName= $_SESSION['UserName'];
$UserRole=	$_SESSION['UserRole'];

$status=$_GET['status'];
	include ('inc/config.php');
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "Update";
		$id = $_GET['id'];
		$sql = "select * from UserInfo where UserID='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$baris = mysql_fetch_object($result);

	} else {
		$aksi = "Save";
	}?>

<h4>Mess ID :  <?php echo $MessID;?></h4>
<h4>Mess ID :  <?php echo $MessName;?></h4>

<form  class="form-horizontal" method="POST" id="form1" action="UserInfo/UserInfo_action.php">
 <legend>  <?php echo $aksi?> User</legend>
	<input type='hidden' name='id' value="<?php echo $id?>">
 	<input type='hidden' name='MessID' value="<?php echo $MessID?>">
 	<input type='hidden' name='status' value="<?php echo $status?>">
  <div class="control-group">
   <label class="control-label" for="UserName">User Name</label>
    <div class="controls">
         <input type="text" name='UserName' class="required" 
      value=<?php echo $baris->UserName;?> > 
    </div>
  </div>
  
  
  <?php if($UserRole=="manager") { ?>
  
  
  	<div class="control-group">
			<label class="control-label" for="jenis">User Role</label>
			<div class="controls">
				<select id='UserRole' name='UserRole'   class="required " >
					<?php
combo_user_type( $baris->UserRole);?>
				</select>
			</div>
		</div>
		
		<?php } else { ?>
		
			<div class="control-group">
			<label class="control-label" for="jenis">User Role</label>
			<div class="controls">
				<select id='UserRole' name='UserRole' value='member'   class="required "  disabled="true" >
					<?php
combo_user_type( $baris->UserRole);?>
				</select>
			</div>
		</div>
		
		<?php } ?>
		
		
		
	<div class="control-group">
			<label class="control-label" for="ContactNo">Contact number</label>
			<div class="controls">
				<input type="text" name='ContactNo' value='<?php echo $baris->ContactNo?>' class='required'
				>
			</div>
		</div>	
		
  <div class="control-group">
    <label class="control-label" for="Password">Password</label>
    <div class="controls">
         <input type="password" name='Password' class="required" minlength="5"
      >    
    </div>
  </div>
 
  <div class="control-group">
    <div class="controls">
     
      <button type="submit" class="btn btn-success" name='aksi'value=<?php echo $aksi?> ><?php echo $aksi?></button>
    </div>
  </div>
</form>

