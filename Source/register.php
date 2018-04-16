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
	<div style="    background-color: white;
    width: 40%;
    border-radius: 30px;
    margin-top: 70px;">
		<div class="header" style="width:100%;">
			<img src="CommunityConnect.png" alt="Smiley face" height="150" width="180">
			<h2>REGISTER</h2>
		</div>
		<form method="post" action="register.php" style="width:100%;">

		<?php include('errors.php'); ?>
		
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" class="form-control" placeholder="Password" name="password_1">
		</div>
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" class="form-control"  placeholder="Confirm Password" name="password_2">
		</div>
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
			<input type="text" class="form-control" placeholder="Mobile" name="phoneno">
		</div>
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
			<input type="text" class="form-control" placeholder="Address" name="address">
		</div>
		
		<div class="input-group">
			<button type="submit" class="btn btn-primary" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
	</div>
	
	
	
</body>
</html>