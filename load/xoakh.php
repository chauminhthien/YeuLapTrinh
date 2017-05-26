<?php
	session_start();
	$st = 0;
	if(empty($_GET) && count($_POST) == 1 && isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
		$id 		= $_POST["id"];

		$sql 		=  "DELETE FROM khoahoc WHERE Id_kh = '{$id}' LIMIT 1";
		$reqult 	= $mysqli -> query($sql);

		if($reqult){
			$sqlv 	=  "DELETE FROM noidung WHERE Id_kh = '{$id}' LIMIT 1";
			$requltv 	= $mysqli -> query($sqlv);
			if($requltv){
				$st = 1;
			}
			
		}

		$ar = array("st" => $st);
		echo json_encode($ar);
	}else{ 
?>
Bạn khong duoc vao
<?php }?>