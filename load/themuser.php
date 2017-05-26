<?php
	session_start();
	$st 	= 0;
	$loi 	= array();
	if(empty($_GET) && count($_POST) == 3){
		include "../function/dbconnect.php";
		$fullname 		= $_POST['fullname'];
		$email 			= $_POST['email'];
		$password 		= $_POST['password'];

		$tim 			= "SELECT * FROM admin WHERE Email = '{$email}' LIMIT 1";
		$requlttim 		= $mysqli -> query($tim);
		$artim 			= mysqli_fetch_assoc($requlttim);

		if($artim['Id_Ad']){
			$st 			= 0;
			$loi['email'] 	= "Email Tồn Tại";
			
		}

		if(count($loi) == 0){
			$pass 		=  md5(md5($password));

			$sql 		= "INSERT INTO admin (Email, PassWord, FullName ) VALUES ('{$email}', '{$pass}', '{$fullname}' ) ";
			$reult 		= $mysqli -> query($sql);
			if($reult){

				$st 	= 1;

			}
		}

		$ar = array("st" => $st, "loi" => $loi);
		echo json_encode($ar);

	}else{

	}?>


