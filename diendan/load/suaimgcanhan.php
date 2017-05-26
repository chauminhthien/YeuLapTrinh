<?php
	session_start();
	$response = array( 'st' => 0);

	if(isset($_SESSION['User'])){
		include './../../function/dbconnect.php';
		$id 		= $_SESSION['User']['Id_User'];
		$fileName 	= $_FILES['file']['name'];
		$upload     = move_uploaded_file($_FILES['file']['tmp_name'], './../../files/' . $fileName);
		if($upload){
			$sql 		= "UPDATE `user` SET `Img_user` = '{$fileName}' WHERE `Id_User` = $id ";
			$reqult 	= $mysqli -> query($sql);
			if($reqult){
				$response['st'] = 1;
				$_SESSION['User']['Img_user'] = $fileName;
			}
		}
		echo json_encode($response);
	}