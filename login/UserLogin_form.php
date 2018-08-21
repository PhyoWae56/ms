<?php
$MessName= $_SESSION['MessName'];
$MessID= $_SESSION['MessID'];
?>
<h4>Mess ID :  <?php echo $MessID;?></h4>
<h4>Mess Name :  <?php echo $MessName;?></h4>

	
	
	
	<div class="span5  offset1 well">
                <form method="POST" id="form1" class="form-horizontal" action="login/UserLogin_action.php">
                    
                <a href="index.php?mod=UserInfo&pg=UserInfo_form&status=1"
			class='btn'	></i>Create New User</a>
                
                <legend>
                 User Login 
                </legend>
                <input type='hidden' name='MessID' value="<?php echo $MessID?>">
                <div class="control-group">
                <label class="control-label" for="nama">User Name</label>
                <div class="controls">
                <input   type="text" name='username'>
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="nama">Password</label>
                <div class="controls">
                <input   type="password" name='password'>
                </div>
                </div>
                
                <div class="row">
                <div class="span4 offset2">
                <input type="submit"  name="login" class="btn btn-primary" value='login'>
                
                </div>
                </div>
                
                </form>
            <script language="javaScript" type="text/javascript"
            xml:space="preserve">
            
            var f  = new Validator("form1");
            f.EnableOnPageErrorDisplaySingleBox();
            f.EnableMsgsTogether();
            f.addValidation("username","req","username ");
            f.addValidation("password","req","Password ");
            </script>
                    <div id="form1_errorloc" style="color:#ff0000">
                    <?php 
                    if(isset($_GET['s'])){
                    echo "Login Failed, Invalid Username or Password!";
                    }
                    ?>
                    </div>
                    
</div>
	