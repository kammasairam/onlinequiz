<?php
	require('database.php');
	session_start();
	if(isset($_SESSION["email"]))
	{
		session_destroy();
	}
	
	$ref=@$_GET['q'];		
	if(isset($_POST['submit']))
	{	
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$str = "SELECT * FROM user WHERE name='$email' and password='$pass'";
		$result = mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1) 
		{
			echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
			header("refresh:0;url=login.php");
		}
		else
		{
			$_SESSION['logged']=$email;
			$row=mysqli_fetch_array($result);
			$_SESSION['name']=$row[1];
			$_SESSION['id']=$row[0];
			$_SESSION['email']=$row[2];
			$_SESSION['password']=$row[3];
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
		<title>Login MLRITM Online Quiz</title>
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
	<center><header>
	<div style="background-color:white;" >
	    <br>
        <img src="https://www.mlritm.ac.in/assets/images/logo-new.png" alt="Smiley face">
        <br><br>
        </div></header></center>
		<section class="login first grey" style="background: rgba(0, 0, 0, 0.5)";>
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> <h5 style="font-family: Noto Sans;">Login to </h5><h4 style="font-family: Noto Sans;">MLRITM Online Quiz</h4></center><br>
							<form method="post" action="login.php" enctype="multipart/form-data">
								<div class="form-group">
									<label>Enter Your Hallticket No:</label>
									<input type="text" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">Enter Your Password:
									</label>
									<input type="password" name="password" class="form-control">
								</div> 
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Login</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a href="register.php">Register</a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<br>
    <footer style="background: rgba(0, 0, 0, 0.5)";><br><Br>
       <center><h4 style="color:white">Designed and Developed By:<br>
            K satya shiva sai ram</h4></center><br>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>