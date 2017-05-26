<?php
	session_start();
	$st = 0;
	if(empty($_GET) && count($_POST) == 1 && isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
		$id 		= $_POST["id"];

		$sql 		=  "DELETE FROM noidung WHERE Id_nd = '{$id}' LIMIT 1";
		$reqult 	= $mysqli -> query($sql);

		if($reqult){
			$st = 1;
		}else{
			$st = 0;
		}

		$ar = array("st" => $st);
		echo json_encode($ar);
	}else{ 
?>
Bạn khong duoc vao
<?php }?>