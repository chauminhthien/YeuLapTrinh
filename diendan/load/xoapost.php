<?php 
	
	session_start();
	$reponsive = array('st' => 0, 'bl' => 0, 'choi' => 0);
	if(count($_POST) == 1 && $_SESSION['User']){
		include './../../function/dbconnect.php';
		$id 						= $_POST['id'];

		$sql 						= "DELETE FROM `post` WHERE `Id_post` = $id LIMIT 1 ";
		$reqult 					= $mysqli -> query($sql);
		if($reqult){
			$sqlHoi    			 	= "SELECT COUNT(`post`.`Id_post`) AS cauhoi  FROM `post` ";
			$requltHoi  			= $mysqli -> query($sqlHoi);
			if($requltHoi){
			   $arHoi      			= mysqli_fetch_assoc($requltHoi);
			}

			$reponsive['choi'] 		= $arHoi['cauhoi'];

			$sqlcmt 				= "DELETE FROM `cmt` WHERE `cmt`.`Id_post` = $id";
			$requltcmt 				= $mysqli -> query($sqlcmt);
			if($requltcmt){
				$sqlCMT     		= "SELECT  COUNT(`cmt`.`Id_cmt`) AS cmt  FROM  `cmt` ";
				$requltCMT  		= $mysqli -> query($sqlCMT);
				if($requltCMT){
				   $arCMT      		= mysqli_fetch_assoc($requltCMT);
				}
				$reponsive['bl'] 	= $arCMT['cmt'];
				$reponsive['st'] 	= 1;
			}
		}
		echo json_encode($reponsive);
	}
?>