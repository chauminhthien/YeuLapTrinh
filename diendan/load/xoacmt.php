<?php 
	
	session_start();
	$reponsive = array('st' => 0);
	if(count($_POST) == 1 && $_SESSION['User']){
		include './../../function/dbconnect.php';
		$id 						= $_POST['id'];

		$sql 						= "DELETE FROM `cmt` WHERE `Id_cmt` = $id LIMIT 1 ";
		$reqult 					= $mysqli -> query($sql);
		if($reqult){
			$reponsive['st'] = 1;
		}
		echo json_encode($reponsive);
	}
?>