<?php 
	session_start();
	$reponsive = array('st' => 0, 'mes' => '');
	if(count($_POST) == 2 && isset($_SESSION['User'])){
		include './../../function/dbconnect.php';
		$id 		= $_POST['id'];
		$post 		= $_POST['post'];

		$sql 		= "UPDATE `post` SET `Nd_post` = '{$post}' WHERE `post`.`Id_post` = $id";
		$reqult  	= $mysqli -> query($sql);
		if($reqult){
			$reponsive['st'] = 1;

			$sqltim 			= "SELECT `Nd_post` FROM `post` WHERE `Id_post` = $id";
			$requlttiem  		= $mysqli -> query($sqltim);
			$artim 				= mysqli_fetch_assoc($requlttiem);
			$reponsive['mes'] 	= $artim['Nd_post'];
		}
		echo json_encode($reponsive);
	}

