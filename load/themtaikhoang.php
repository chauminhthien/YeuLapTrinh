<?php
	session_start();
	$st 	= 0;
	$loi 	= array();
	if(empty($_GET) && count($_POST) == 6){

		include "../function/dbconnect.php";
		$namedk 		= $_POST['namedk'];
		$emaildk 		= $_POST['emaildk'];
		$passdk 		= $_POST['passdk'];
		$phonedk 		= $_POST['phonedk'];
		$addressdk 		= $_POST['addressdk'];
		$gioitinh 		= $_POST['gioitinh'];
		$img 			= "user.png";
		$time 			= time();

		$tim 			= "SELECT * FROM `user` WHERE Email = '{$emaildk}' LIMIT 1";
		$requlttim 		= $mysqli -> query($tim);
		$artim 			= mysqli_fetch_assoc($requlttim);

		if($artim['Id_User']){
			$st 			= 0;
			$loi 	= "Email Tồn Tại";
			
		}

		if(count($loi) == 0){
			$pass 		=  md5(md5($passdk));

			$sql 		= "INSERT INTO user (FullName, Email, PassWord, Phone, Address, GioiTinh, Img_user, Time ) 
								VALUES ('{$namedk}', '{$emaildk}', '{$pass}', '{$phonedk}', '{$addressdk}', '{$gioitinh}', '{$img}', '{$time}' ) ";
			$reult 		= $mysqli -> query($sql);
			if($reult){

				$st 	= 1;

			}
		}

		$ar = array("st" => $st, "loi" => $loi);
		echo json_encode($ar);

	}else{

	}?>


