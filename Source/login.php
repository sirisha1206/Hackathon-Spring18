<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="balign">
	<div style="background-color: white;
    width: 40%;
    border-radius: 30px;
    margin-top: 70px;">
	<div class="header" style="width:100%;">
		<img src="CommunityConnect.png" alt="Smiley face" height="150" width="180">
		<h2>USER LOGIN</h2>
		
	</div>
	
	<form method="post" action="login.php" style="width:100%">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" class="form-control" name="username" placeholder="Username" >
		</div>
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password"class="form-control" name="password" placeholder="Password">
		</div>
		<div class="input-group ">
			<button type="submit" class="btn btn-primary" name="login_user" style="margin-left: 90px;">Login</button>
		</div>
		<button class="btn btn-primary">
			 <a href="register.php" style="color:white;text-decoration:none;">Register</a>
		</button>
        <button class="btn btn-primary">
			 <a href="adminlogin.php" style="color:white;text-decoration:none;">Admin Login</a>
		</button>
	</form>

	</div>
	

</body>
</html>