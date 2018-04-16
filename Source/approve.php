
	<?php
	include_once "server.php";
	if (isset($_POST['approve'])) {
	if(!empty($_POST['check_list'])) {
		foreach($_POST['check_list'] as $check) {
		   $sql="UPDATE `users` SET `approved`=\"approved\" WHERE `id`=$check ;" ; 
		   mysqli_query($db,$sql);
		}
	?>
    <h1> <font color="green">APPROVED SUCCESSFULLY..</font></h1>
    <?php
	}
	}
	 elseif (isset($_POST['reject'])) {
        if(!empty($_POST['check_list'])) {
		foreach($_POST['check_list'] as $check) {
		   $sql="DELETE FROM `users` WHERE `id`=$check;" ; 
		   mysqli_query($db,$sql);
		}
		}
	
	?>
    <h1> <font color="red">REJECTED SUCCESSFULLY..</font></h1>
   
	<?php
	 } 
	elseif(isset($_POST['delete'])) {
        if(!empty($_POST['check_list'])) {
		foreach($_POST['check_list'] as $check) {
		   $sql="DELETE FROM `users` WHERE `id`=$check;" ; 
		   mysqli_query($db,$sql);
		}
		}
	}
	header("refresh:2; url=adminindex.php");
	?>
