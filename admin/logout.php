<?php
	session_start();
	if(isset($_SESSION['Email'])){
			
			unset($_SESSION['Email']);
		};
		if(isset($_SESSION['FullName'])){
			unset($_SESSION['FullName']);
		};
		if(isset($_SESSION['Id_Users'])){
			unset($_SESSION['Id_Users']);
		};
		//chuyen hướng
		header ("location: /YeulapTrinh/admin");
		//header ("location: http://yeulaptrinh.byethost7.com/admin");
?>