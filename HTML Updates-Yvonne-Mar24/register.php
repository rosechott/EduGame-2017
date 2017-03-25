<?php 
 require_once 'function.php';
 
 $username = $password = $rePassword = $dateOfBirth = $gender = $accept ="";
 $usernameErr =  $passwordErr = $rePasswordErr = $dateOfBirthErr = $genderErr = $acceptErr ="";
 
  
    @$username = sanitizeString($_POST['username']);
    @$password = sanitizeString($_POST['password']);
    @$rePassword = sanitizeString($_POST['rePassword']);
	@$dateOfBirth = sanitizeString($_POST['dateOfBirth']);
	@$gender = $_POST['gender'];
	@$accept = $_POST['accept'];

	$result = queryMysql("SELECT * FROM Login WHERE username='$username'");
    
	if ($result->num_rows==1){  
      $usernameErr = "That name already exists!";
    }
	
    if ($_SERVER["REQUEST_METHOD"] == "POST") {	
      if (empty($_POST["username"])) {
        $usernameErr = "Full name must be entered!";
      }else {
        $username = test_input($_POST["username"]);
        /*if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$username)) {
          $usernameErr = "Invalid username form!"; 
        }*/
      }
              
      if (empty($_POST["password"])) {
        $passwordErr = "Password must be entered!";
      } else {
        $password = test_input($_POST["password"]);
        /*if (!preg_match("^[a-zA-Z0-9]$/",$password)) {
          $passwordErr = "Allow only letters and numbers!"; 
        }*/
      }
             
      if (empty($_POST["rePassword"])) {
        $rePasswordErr = "Password must be re-entered!";
      } else {
        $rePassword = test_input($_POST["rePassword"]);
        if ($password!=$rePassword) {
          $rePasswordErr = "The password does not match!"; 
        }
      }
		   
		   
	  if (empty($_POST["dateOfBirth"])) {
        $gdateOfBirthErr = "Date of birth must be entered!";
      } else {
        $dateOfBirth = test_input($_POST["dateOfBirth"]);
      }  	   
		   	   
		   
	  if (empty($_POST["gender"])) {
        $genderErr = "Please select the gender.";
      } else {
        $gender = test_input($_POST["gender"]);
      }  
	  
	  if (empty($_POST["accept"])) {
        $acceptErr = "Please appect the term!";
      } 
	  
	     
    }
  
	
    if(($username !="") && ($usernameErr=="") && ($result->num_rows==0) && ($password==$rePassword) && ($dateOfBirthErr=="") && ($genderErr=="") && ($acceptErr=="")){
	  	
      queryMysql("INSERT INTO Login VALUES('$username','$password')");
      
      queryMysql("INSERT INTO Student (username, dateOfbirth, gender) VALUES('$username','$dateOfBirth','$gender')");
  
      die("<h4>Account created</h4>Please Log in.<br><br>");
    }

	
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>



<!DOCTYPE html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta charset="utf-8">
	<title>Register</title>
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
					<li class="active"><a data-toggle="tab" href="#register">Register</a></li>
					<!--<li><a data-toggle="tab" href="#login">Login</a></li>-->
				</ul>
			</div>
			<div class="col-sm-3"></div>
		</div>
		
		
		<div class="tab-content">    
			<div id="register" class="tab-pane fade in active">

				<div class="form-horizontal" role="form">
                <form method="POST" name="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" name="username" placeholder="Username" class="form-control" autofocus>
                            <!-- error style css -->
                            <span class="error"><font size=2><?php echo $usernameErr;?></font></span>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password" placeholder="Password" class="form-control">
                            <span class="error"><font size=2><?php echo $passwordErr;?></font></span>
						</div>
					</div>
					<div class="form-group">
						<label for="confirm password" class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-10">
							<input type="password" name="rePassword" placeholder="Confirm Password" class="form-control">
                            <span class="error"><font size=2><?php echo $rePasswordErr;?></font></span>
						</div>
					</div>
					<div class="form-group">
                      <label for="birthDate" class="col-sm-2 control-label">Date of Birth</label>
						<div class="col-sm-10">
							<input type="dateofBirth" name="dateOfBirth" placeholder="Date of birth" class="form-control">
                            <span class="error"><font size=2><?php echo $dateOfBirthErr;?></font></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Gender</label>
						<div class="col-sm-6">       
							<div class="row">
								<div class="col-sm-6">
									<label class="radio-inline">
										<input type="radio" name="gender" value="Female">Female
									</label>
								</div>
								<div class="col-sm-6">
									<label class="radio-inline">
										<input type="radio" name="gender" value="Male">Male
                                        &nbsp;&nbsp;&nbsp;<span class="error"><font size=2><?php echo $genderErr;?></font></span>
									</label>
								</div>

							</div>
						</div>
					</div> 
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="accept">I accept <a href="#">terms</a>
                                    &nbsp;&nbsp;&nbsp;<span class="error"><font size=2><?php echo $acceptErr;?></font></span>
								</label>
							</div>
						</div>
					</div> 
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input type="submit" name="register" class="btn btn-primary btn-block" value="Register">
                            <br>Already have an account? <a href='login.php'>Log in</a> !
						</div>
					</div>
				</form>
			</div>
            
           
		 </div>
	  </div>
   </div>
</body>
</html>


