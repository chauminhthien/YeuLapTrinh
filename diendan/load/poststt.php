<?php 
	session_start();
	$reponvive =  array('st' => 0);
	if(count($_POST) == 1 && isset($_SESSION['User'])){
		include './../../function/dbconnect.php';
		$id 		= $_SESSION['User']['Id_User'];
		$poststt 	= $_POST['poststt'];
		$time 		= time();
		$sql 		= "INSERT INTO `post` ( `Nd_post`, `st`, `Time_post`, `Id_User`) 
						VALUES ( '{$poststt}', '1', '{$time}', $id);";
       
        $requle 	= $mysqli -> query($sql);
        if($requle){
        	$reponvive['st'] = 1;
        }
       echo json_encode($reponvive);
	}