<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form method = "POST" enctype="multipart/form-data">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="username" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Repassword</h5>
           		    	<input type="password" name="repassword" class="input">
            	   </div>
            	</div>
				<a align="left" href="login.php">login</a>
            	<input type="submit" class="btn" name="register" value="Register">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>

	<?php  
  $connect = mysqli_connect('localhost','root','mysql','shopee');
	if(!$connect){
		echo("Kết nối thất bại");
	}
	
  if (isset($_POST['register'])&& $_POST["username"] !='' && $_POST["password"] !='' && $_POST["repassword"] !='') { 
 
    $username = $_POST['username'];
    $password = $_POST['password'];
	$repassword = $_POST['repassword'];
	if ($password != $repassword){
		echo"<script>window.open('register.php','_self')</script>";
	}
	else{
	$sql = "SELECT * FROM user WHERE username='$username'";
    $old = mysqli_query($connect,$sql);
	echo mysqli_num_rows($old);
    if (mysqli_num_rows($old)>= 1){
	echo "<script>alert('username unavailable')</script>";
    // //   echo "<script>alert('Account has been created successfully!')</script>";
    //  //echo "<script>window.open('login.php','_self')</script>";
    }

	else{
		$sql="insert into user values (NULL,'$username','$password')";
		mysqli_query($connect,$sql);
	echo "<script>alert('Account has been created successfully!')</script>";
    }  
	

  }
}
  ?>
</body>
</html>
