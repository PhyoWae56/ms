

	<div class="span5  offset1 well">
                <form method="POST" id="form1" class="form-horizontal" action="login/login_action.php">
                
                
                <legend>
                Mess Login
                </legend>
                <div class="control-group">
                <label class="control-label" for="nama">Mess Name</label>
                <div class="controls">
                <input   type="text" name='MessName'>
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="nama">Password</label>
                <div class="controls">
                <input   type="password" name='Password'>
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
            f.addValidation("MessName","req","MessName");
            f.addValidation("Pasword","req","Pasword");
            </script>
                    <div id="form1_errorloc" style="color:#ff0000">
                    <?php 
                    if(isset($_GET['s'])){
                    echo "Login Failed, Invalid MessName or Password!";
                    }
                    ?>
                    </div>
                    
</div>
	

