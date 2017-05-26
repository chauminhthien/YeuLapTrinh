<?php 
	session_start();
	if(count($_POST) == 1 && isset($_SESSION['User'])){
		include './../../function/dbconnect.php';
		$id 		= $_POST['id'];

		$sql 		="SELECT `Cmt` FROM `cmt` WHERE `Id_cmt` = $id LIMIT 1";
		$reqult 	= $mysqli -> query($sql);
		$ar 		= mysqli_fetch_assoc($reqult);

		echo '<form class="form_sua_cmt" method="post" action="" suacmt="'.$id.'">
				<div class="suapost">
					<textarea id="sua_cmt_post" class="form-control">'.$ar['Cmt'].'</textarea>
				</div>
				<div class="rowBottom">
					<button type="submit">Cập Nhật</button>
					<button class="Close">Close</button>
				</div>
				<div class="clear"></div>
			</form>';
	}
?>

