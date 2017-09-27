<?php

require '../db/connect.php';
require '../functions/security.php';
$err="";
//ini_set('session.gc_maxlifetime', 1800);
//session_set_cookie_params(1800);
session_start();

if(!empty($_POST))
{
	if(isset($_POST['username'],$_POST['key']))
	{
		$username=trim($_POST['username']);
		$password=trim($_POST['key']);
		if(!empty($username) && !empty($password))
		{      
            $password=md5($password);
            $query="Select * from users where Username='$username' And Password='$password'";        
			if($result=mysqli_query($db,$query))
			{
				if(mysqli_num_rows($result)>0)
				{
                    $row=mysqli_fetch_assoc($result);                
                    $_SESSION["Id"]=$row['Id'];
                     if(!isset($_SESSION['timeout'])){
                         $_SESSION['timeout'] = time();
                     }                    
					header('Location: dashboard.php');
					die();
				}
				else
				{
					$err='<span class="text-danger" style="margin-left:50px">* Invalid Username or Password</span>';
				}
			}
			else
			{
				$err='<span class="text-danger" style="margin-left:50px">* Seems to have issue executing the query</span>';
			}
		}
		else
		{
			$err='<span class="text-danger" style="margin-left:50px">* Please enter username and password</span>';
		}		
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
</head>
<body>
   <section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                    <div class="logo">
                         <img src="../img/logo.png" height="200" alt="ECPP Logo"/>
                    </div>            
                    <form role="form" action="index.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="key" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                           <?php echo $err;?>
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Show password</span>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                    </form>                   
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<!--<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom">Recovery</button>
			</div>
		</div> <!-- /.modal-content
	</div> <!-- /.modal-dialog
</div> <!-- /.modal -->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>ECPP © copyright - 2017</p>
                <p>Powered by <strong><a href="http://www.quick-picker.com" target="_blank">Quick Picker</a></strong></p>
            </div>
        </div>
    </div>
</footer>
    <script type="text/javascript" src="../js/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function showPassword() {
            var key_attr = $('#key').attr('type');

            if(key_attr != 'text') {

                $('.checkbox').addClass('show');
                $('#key').attr('type', 'text');

            } else {

                $('.checkbox').removeClass('show');
                $('#key').attr('type', 'password');

            }
        }
    
    </script>
</body>
</html>

