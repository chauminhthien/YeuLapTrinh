<?php
	session_start();
	$reponvie = array('st' => 0);
	if(count($_POST) == 6 && isset($_SESSION['User'])){
		include './../../function/dbconnect.php';
		$id 		= $_POST['id'];
		$fullname 	= $_POST['fullname'];
		$password 	= '';
		if(strlen($_POST['password']) > 0){
			$password 	= '`PassWord` = ' . '\'' .md5(md5($_POST['password'])).'\'' . ', ';
		}
		$gioitinh 	= $_POST['gioitinh'];
		$phone 		= $_POST['phone'];
		$address 	= $_POST['address'];

		$sql = "UPDATE `user` SET 
				`FullName` = '{$fullname}',
				$password  
				`Phone` = '{$phone}',
				`Address` = '{$address}',
				`GioiTinh` = '{$gioitinh}'
				WHERE `Id_User` = $id LIMIT 1
				";
		$reqult = $mysqli -> query($sql);
		if($reqult){
			$reponvie['st'] = 1;
			$_SESSION['FullName'] = $fullname;
		}

		echo json_encode($reponvie);
	}