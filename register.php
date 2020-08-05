<?php
	include("database.php");
	session_start();
	
	if(isset($_POST['submit']))
	{	
		$name = $_POST['name'];
		$name = stripslashes($name);
		$name = addslashes($name);

		$email = $_POST['email'];
		$email = stripslashes($email);
		$email = addslashes($email);

		$password = $_POST['password'];
		$password = stripslashes($password);
		$password = addslashes($password);
		
		$year = $_POST['year'];
		$year = stripslashes($year);
		$year = addslashes($year);

		$college = $_POST['college'];
		$college = stripslashes($college);
		$college = addslashes($college);
		
		$str="SELECT email,name from user WHERE email='$email'";
		$result=mysqli_query($con,$str);
		
		$str1="SELECT name from user WHERE name='$name'";
		$result1=mysqli_query($con,$str1);
		
		
		if((mysqli_num_rows($result))>0)	
		{
            echo "<center><h3><script>alert('Sorry.. This E-mail is already registered !!');</script></h3></center>";
            header("refresh:0;url=login.php");
        }
        elseif((mysqli_num_rows($result1))>0)	
		{
            echo "<center><h3><script>alert('Sorry.. This Roll No is already registered !!');</script></h3></center>";
            header("refresh:0;url=login.php");
        }
		else
		{
            $str="insert into user set name='$name',email='$email',password='$password',college='$college',year='$year'";
			if((mysqli_query($con,$str)))	
			echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
			header('location: welcome.php?q=1');
		}
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Register MLRITM Online Quiz</title>
		<link rel="shortcut icon" href="https://images.static-collegedunia.com/public/college_data/images/logos/1487047679mlr.png">
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
        <style type="text/css">
            body {
                  width: 100%;
                  background-image: url('https://img.freepik.com/free-psd/tropical-foliage-background_53876-91352.jpg?size=626&ext=jpg');
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-position: center;
                  background-size: cover;
                }

          </style>
	</head>

	<body>
	<center>
	<div style="background-color:white;">
	    <br>
        <img src="https://www.mlritm.ac.in/assets/images/logo-new.png" alt="Smiley face">
        <br><br>
        </div></center>
		<section class="login first grey" style="background: rgba(0, 0, 0, 0.5)";>
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<center> <h5 style="font-family: Noto Sans;">Register to </h5><h4 style="font-family: Noto Sans;">MLRITM Online Quiz's</h4></center><br>
							<form method="post" action="register.php" enctype="multipart/form-data">
                                <div class="form-group">
									<label>Enter Your Hallticket No: <spam style="color:red">*</spam></label>
									<input type="text" name="name" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Enter Your Password: <spam style="color:red">*</spam></label>
									<input type="password" name="password" class="form-control" required />
                                </div>
                                <div class="form-group">
									<label>Enter Your Email Id: <spam style="color:red">*</spam></label>
									<input type="email" name="email" class="form-control" required />
								</div>
								
								<div class="form-group">
									<label>Select Year: <spam style="color:red">*</spam></label><br>
									<select type="number" id="year" name="year" class="form-control" required />
									       <option value="">-- Select Year --</option>
                                          <!--<option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>-->
                                          <option value="4">4</option>
                                        </select>
								</div>
								
								
								<div class="form-group">
									<label>Select Your Batch: <spam style="color:red">*</spam></label><br>
									<select type="text" id="class" name="college"  class="form-control" required />
									   <option value="">-- Select Branch and Section --</option>                                                              <option value="CSE">CSE</option>
                                          <option value="IT">IT</option>
                                          <option value="ECE">ECE</option>
                                          <option value="EEE">EEE</option>
                                          <option value="CIVIL">CIVIL</option>
                                          <option value="MECH">MECH</option>
                                          <option value="STAFF">STAFF</option>
                                        </select>
								</div>
								
								<div class="form-group text-center">
									<span class="text-muted" style="color:red; font-size:20px">NOTE: </span><b>Every Field Must be Filled, Otherwise Test will not Shown to You</b>
								</div>
                                
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Register</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account! </span> <a href="login.php">Login </a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<br>
    <footer style="background: rgba(0, 0, 0, 0.5)";><br><Br>
       <center><h3 style="color:white">Designed and Developed By:<br>
            K satya shiva sai ram</h3></center><br>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>