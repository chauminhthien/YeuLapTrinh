<?php 
	session_start();
	$reponsive = array('st' => 0, 'mes' => '');

	if(count($_POST) == 2 && isset($_SESSION['User'])){
		include './../../function/dbconnect.php';
		$id 		= $_POST['id'];
		$cmt 		= $_POST['cmt'];


		$sql 		= "UPDATE `cmt` SET `Cmt` = '{$cmt}' WHERE `cmt`.`Id_cmt` = $id";
		$reqult  	= $mysqli -> query($sql);
		 if($reqult){
			$reponsive['st'] = 1;

			$sqltim 			= "SELECT `Cmt` FROM `cmt` WHERE `Id_cmt` = $id";
			$requlttiem  		= $mysqli -> query($sqltim);
			$artim 				= mysqli_fetch_assoc($requlttiem);
			$reponsive['mes'] 	= $artim['Cmt'];
		}
		echo json_encode($reponsive);
	}

