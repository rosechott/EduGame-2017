<?php 
 require_once 'function.php';

  $error = $accountErr = $username = $password  ="";

if (isset($_POST['username']))
  {
    $username = sanitizeString($_POST['username']);
    $password = sanitizeString($_POST['password']);
    
    if ($username == "" || $password =="")
        $error = "Please enter all fields! <br>";
    else
    {
      $result = queryMySQL("SELECT username,password FROM Login
        WHERE username='$username' AND password='$password'");
      if ($result->num_rows == 0)
      {
        $accountErr = "The account is invalid! Please check your username and password.";
      }
      else
      {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
       
        
        die("Log in sucessfully!");
      }
    }
  }
?>


<html>
<!DOCTYPE html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta charset="utf-8">
	<title>Log in</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<html lang="en">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<img src="image/Logo1.png" class="img-responsive center-block" alt="The Silk Road">
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" style="margin:20px; padding: 20px;">
				<ul class="nav nav-tabs nav-justified">
					<li class="active"><a data-toggle="tab" href="#login">Login</a></li>
				</ul>
			</div>
			<div class="col-sm-3"></div>
		</div>
		
		
		<div class="tab-content">            
			<div id="login" class="tab-pane fade in active">
            
				<div class="form-horizontal" role="form">
                <form method="POST" name="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" name="username" placeholder="Full Name" class="form-control" autofocus>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password" placeholder="Password" class="form-control">
                            <!-- error style css --><br>
                            <span class="error"><font size=2><?php echo $error;?></span>
                            <span class="error"><font size=2><?php echo $accountErr;?></span>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input type="submit" name="login" class="btn btn-primary btn-block" value="Log in">
                            <br>Don't have an account? <a href='register.php'>Create one</a> !
						</div>
					</div>
                    

				</form>
			    </div>


           </div>
		</div>
	</div>
</body>
</html>