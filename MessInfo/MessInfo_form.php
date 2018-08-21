<?php

	include ('inc/config.php');
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "Update";
		$id = $_GET['id'];
		$sql = "select * from MessInfo where MessID='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$baris = mysql_fetch_object($result);

	} else {
		$aksi = "Save";
	}?>

<form  class="form-horizontal" method="POST" id="form1" action="MessInfo/MessInfo_action.php">
 <legend>  <?php echo $aksi?> Mess</legend>
	<input type='hidden' name='id' value="<?php echo $id?>">
 
  <div class="control-group">
   <label class="control-label" for="MessName">Mess Name</label>
    <div class="controls">
         <input type="text" name='MessName' class="required" 
      value=<?php echo $baris->MessName;?> > 
    </div>
  </div>
  
   <div class="control-group">
   <label class="control-label" for="Address">Mess Address</label>
    <div class="controls">
         <input type="text" name='Address' class="required" 
      value=<?php echo $baris->Address;?> > 
    </div>
  </div>
  
  
  
   <div class="control-group">
   <label class="control-label" for="UserName">User Name</label>
    <div class="controls">
         <input type="text" name='UserName' class="required" 
      value=<?php echo $baris->UserName;?> > 
    </div>
  </div>
  
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

