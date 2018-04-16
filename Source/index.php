<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="bhome">
	<!-- <div class="header">
		<h2>Home Page</h2>
	</div> -->
	<div class="content">

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
		<div class="well" style="padding-left: 450px;
    margin-top: 10px;"><h2><strong>Welcome <?php echo $_SESSION['username']; ?></strong></h2></div>
		<?php endif ?>
		<button  class="btn btn-danger" style="margin-left: 90vw;"> <a href="index.php?logout='1'" style="color: white;">logout</a> </button>
	</div>

		<!-- tabs -->

		<div style="background-color: white;
    width: 40%;
    margin-left: 250px;border-radius: 10px;
    padding-top: 10px;">
		<div>
			<ul class="nav nav-tabs" style="width: 50%;margin-left: 100px;">
				<li class="active"><a data-toggle="tab" href="#home">Write Post</a></li>
				<li><a data-toggle="tab" href="#menu1">View Posts</a></li>
			</ul>
		</div>
		

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<form action='message.php' method='post' style="width: 50%;margin-left: 100px;padding-top: 10px;">
					<div class="input-group">
						<label>Username</label>
						<input type="text" name="msg_username" value="<?php echo $_SESSION['username']; ?>">
					</div>
					<div class="input-group">
						<label>Message</label>
						<input type="text" name="user_message">
					</div>
					<div class="input-group">
						<button type="submit" class="btn" name="message">POST</button>
					</div>
				</form>
			</div>
			<div id="menu1" class="tab-pane fade">
				<div id="show" style="width: 50%;margin-left: 100px;padding-top: 10px;">
					<?php
						$db = mysqli_connect('localhost', 'sirisha', 'siri1206', 'communityconnect');
								$query = "SELECT * FROM message order by msg_id desc";
								$results = mysqli_query($db,$query);
					?>


					<?php
						foreach($results as $result) {			
							echo	"<div class=\"panel panel-info\">
								<div class=\"panel-heading\">{$result['username']}</div>
								<div class=\"panel-body\">{$result['usr_msg']}</div>
							</div>\n";
						}

					?>
				</div>
			</div>
  		</div>
		</div>

		
</body>
</html>