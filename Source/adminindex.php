<?php 
	session_start(); 

	if (!isset($_SESSION['admin_username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: adminlogin.php');
	}

	if (isset($_GET['admin_logout'])) {
		session_destroy();
		unset($_SESSION['admin_username']);
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
	<div class="header">
		<div class="well well-sm" style="width: 80%;
    margin-left: 116px;">	<h2>ADMIN DASHBOARD</h2></div>
	
	</div>
    
	<div class="content" style="width: 80%;
    background-color: white;
    margin-left: 125px;
    border-radius: 10px;padding-top: 20px;">
	
		<!-- logged in user information -->
		<?php  if (isset($_SESSION['admin_username'])) : ?>
        
        <?php
        $db = mysqli_connect('localhost', 'sirisha', 'siri1206', 'communityconnect');
				$query = "SELECT * FROM users";
				$results = mysqli_query($db,$query);
				?>
				
				<button class="btn btn-primary" type="button" onclick="showpr()">Pending Requests</button>
				<button class="btn btn-primary" type="button" onclick="showres()">Residents</button>
				<button class="btn btn-primary" type="button" onclick="showmsg()">View Posts</button>
				<button class="btn btn-primary" type="button" onclick="writepost()">Write Post</button>

				<button class="btn btn-danger" style="margin-left: 896px;"> <a href="adminindex.php?admin_logout='1'" style="color:white;"><span class="glyphicon glyphicon-log-out"> Logout</span></a> </button>

				<div id="pendingreq"  style="display:none;">
					<h2>Pending Requests</h2>
					<form action="approve.php" method="post"> 
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Select</th>
									<th>Username</th>
									<th>Email</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($results as $result) {
											if ($result['approved'] != 'approved'){
										echo
												"<tr>
										<td><input type=\"checkbox\" name=\"check_list[]\" value=\"{$result['id']}\"></td>
													<td>{$result['username']}</td>
													<td>{$result['email']}</td>
													<td>{$result['approved']}</td> 
												</tr>\n";
											}
									}
								?>
							</tbody>
						</table>
						</br>
						<input class="btn btn-success" type="submit" name="approve" id="approve" value="Approve"  style="margin-left: 10%"/>
						<input class="btn btn-danger" type="submit" name="reject" id="reject" value="Reject"  style="margin-left: 15%"/>
					</form> 
				</div>
				
				<div id="approvedresults"  style="display:none;">
					<h2>Residents</h2> 
					<form action="approve.php" method="post">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Select</th>
									<th>Username</th>
									<th>Email</th>
									<th>Address</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($results as $result) {
											if ($result['approved'] != 'not approved'){
										echo
												"<tr>
													<td><input type=\"checkbox\" name=\"check_list[]\" value=\"{$result['id']}\"></td>
													<td>{$result['username']}</td>
													<td>{$result['email']}</td>
													<td>{$result['address']}</td>
												</tr>\n";
											}
									}
								?>
							</tbody>
						</table>
						<input class="btn btn-danger" type="submit" name="delete" id="delete" value="delete"  style="margin-left: 15%"/> 
					</form>
				</div>

				<div id="posts" style="display:none">
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
					
				<div id="writepost" style="display:none">
					<div id="home" class="tab-pane fade in active">
						<form action='message.php' method='post' style="width: 50%;margin-left: 100px;padding-top: 10px;">
							<div class="input-group">
								<label>Username</label>
								<input type="text" name="msg_username" value="<?php echo $_SESSION['admin_username']; ?>">
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
				</div>

		<?php endif ?>
	</div>
		
</body>
<script>
	function showpr() {
   document.getElementById('pendingreq').style.display = "block";
	 document.getElementById('approvedresults').style.display = "none";
	 document.getElementById('posts').style.display = "none";
	 document.getElementById('writepost').style.display = "none";
	}
	function showres() {
   document.getElementById('approvedresults').style.display = "block";
	 document.getElementById('pendingreq').style.display = "none";
	 document.getElementById('posts').style.display = "none";
	 document.getElementById('writepost').style.display = "none";
	}
	function showmsg() {
   document.getElementById('approvedresults').style.display = "none";
	 document.getElementById('pendingreq').style.display = "none";
	 document.getElementById('posts').style.display = "block";
	 document.getElementById('writepost').style.display = "none";
	}
	function writepost() {
   document.getElementById('approvedresults').style.display = "none";
	 document.getElementById('pendingreq').style.display = "none";
	 document.getElementById('posts').style.display = "none";
	 document.getElementById('writepost').style.display = "block";
	}
</script>
</html>