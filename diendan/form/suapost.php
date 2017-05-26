<?php 
	session_start();
	if(count($_POST) == 1 && isset($_SESSION['User'])){
		include './../../function/dbconnect.php';
		$id 		= $_POST['id'];
		$sql 		="SELECT `Id_post`, `Nd_post` FROM `post`  WHERE `Id_post` = $id LIMIT 1";
		$reqult 	= $mysqli -> query($sql);
		$ar 		= mysqli_fetch_assoc($reqult);

		echo '<form class="form_sua_post" method="post" action="" suapost="'.$id.'">
				<div class="suapost">
					<textarea id="sua_post" class="form-control">'.$ar['Nd_post'].'</textarea>
				</div>
				<div class="rowBottom">
					<button type="submit">Cập Nhật</button>
					<button class="Close">Close</button>
				</div>
				<div class="clear"></div>
			</form>';
	}
?>

