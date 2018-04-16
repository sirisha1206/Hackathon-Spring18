
	<?php
	include_once "server.php";
if (isset($_POST['message'])) {
	// receive all input values from the form
	$msg_username = mysqli_real_escape_string($db, $_POST['msg_username']);
	$msg = mysqli_real_escape_string($db, $_POST['user_message']);
	
	// form validation: ensure that the form is correctly filled
	
	
	



	// register user if there are no errors in the form

		$query = "INSERT INTO message (username, usr_msg) 
				  VALUES('$msg_username','$msg')";
		mysqli_query($db, $query);

		if ($msg_username == 'admin' ){
            header('location: adminindex.php');
        }
        else{
		header('location: index.php');
        }

    }
?>