<?php
	session_start();
	$st = 0;
	if(empty($_GET) && count($_POST) == 2){
		include "../function/dbconnect.php";
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		$email 		= $_POST['email'];
		$password 	= md5(md5($_POST['password']));
		//echo $password;
		$sql 		= "SELECT * FROM admin WHERE Email = '{$email}' && PassWord = '{$password}' ";
		$reqult 	= $mysqli -> query($sql);
		$arlg 		= mysqli_fetch_assoc($reqult);
		if(count($arlg) >0){
			$_SESSION['Id_Users'] 	= $arlg['Id_Ad'];
			$_SESSION['Email'] 		= $arlg['Email'];
			$_SESSION['FullName'] 	= $arlg['FullName'];
				// header ("location: https://www.facebook.com/");
				// exit();
			$st = 1;
		}else{
			$st = 0;
		}
		$ar = array("st" => $st);
		echo json_encode($ar);
	}else{
		//echo "Bạn Không Có Quyền Truy Cập";
	}
?>