<?php
	session_start();
	$st 	= 0;
	$loi 	= array();
	if(empty($_GET) && count($_POST) == 5){
		include "../function/dbconnect.php";
		$name 			= $_POST['name'];
		$email 			= $_POST['email'];
		$phone 			= $_POST['phone'];
		$tag 			= $_POST['tag'];
		$noidung 		= $_POST['noidung'];
		$time 			= time();


			$sql 		= "INSERT INTO lienhe (FullName, Email, Phone, Tag, Noi_dung, time ) 
								VALUES ('{$name}', '{$email}', '{$phone}','{$tag}','{$noidung}','{$time}' ) ";
			$reult 		= $mysqli -> query($sql);
			if($reult){

				$st 	= 1;

			}

		$ar = array("st" => $st, "loi" => $loi);
		echo json_encode($ar);

	}else{

	}?>


