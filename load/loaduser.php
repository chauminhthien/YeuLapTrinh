<?php
	session_start();
	$st = 0;
	$loi = array();

	if(empty($_GET) && count($_POST) == 3){
		include "../function/dbconnect.php";
		$fullname 	= $_POST['fullname'];

		if(strlen($fullname) < 3){
			$loi['fullname'] = "FullName lớn hơn 3 ký tự";
		}

		$pass 		= $_POST['password'];
		if(strlen($pass) < 7){
			$loi['password'] = "PassWord  lớn hơn 7 ký tự";
		}

		$id = $_POST['id'];

		if(count($loi) == 0){
			$password = md5(md5($pass));
			$sql = "UPDATE admin SET FullName = '{$fullname}', PassWord = '{$password}' WHERE Id_Ad = '{$id}' ";
			$requlr = $mysqli -> query($sql);
			if($requlr){
				$st = 1;
				
				$_SESSION['FullName'] 	= $fullname;
			}
		}
		
		$re = array("st" => $st ,  "loi" => $loi);
		echo json_encode($re);
	} 
?>
