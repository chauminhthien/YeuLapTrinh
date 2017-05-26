<?php
	session_start();
	$st = 0;

	if(count($_POST) == 1 && $_GET['type'] == "xoa" ){
		include "../function/dbconnect.php";
		$id 		= $_POST['id'];
		$sql 		= "DELETE FROM admin WHERE Id_Ad = '{$id}' LIMIT 1 ";
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
ban khong duoc vao
<?php }?>
