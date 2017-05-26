<?php 
	session_start();
	$reponvie = array('st' => 0, 'mes' => '');
	if(count($_POST) == 2){
		include './../../function/dbconnect.php';
		$email 	= $_POST['email'];
		$pass 	= md5(md5($_POST['pass']));

		$sql 	= "SELECT `Id_User`, `FullName`, `Img_user` FROM `user` WHERE `Email` = '{$email}' AND `PassWord` = '{$pass}' ";
		$requle = $mysqli -> query($sql);
		$arUesr = mysqli_fetch_assoc($requle);
		if(count($arUesr) > 0){
			
			$_SESSION['User'] 	= $arUesr;
			$reponvie['st'] 	= 1;
		}else{
			$reponvie['mes'] 	= 'Thông Tin đăng nhập không Đúng';
		}

		echo json_encode($reponvie);
	}