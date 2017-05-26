<?php
	if(!$_SESSION['Id_Users']){
		header("location: login.php");
		exit();
	}
?>