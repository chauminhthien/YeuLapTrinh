<?php 
	session_start();
	if(count($_POST) == 2 && isset($_SESSION['User'])){

		include './../../function/dbconnect.php';
		$idUser = $_SESSION['User']['Id_User'];
		$Id_post = $_POST['id'];
		$cmt 	= $_POST['cmt'];
		$time 	= time();

		$sql 	= "INSERT INTO `cmt`(`Cmt`,`Id_User`, `Id_post`, `Time_cmt`)
					VALUES ('{$cmt}', '{$idUser}', '{$Id_post}', '{$time}')";


		$reqult = $mysqli -> query($sql);
		if($reqult){
			$sqlcmt 		= "SELECT `Id_cmt`, `Cmt`, `Time_cmt`,`user`.`Id_User` AS `iduser`,  `user`.`FullName` AS `name`, `user`.`Img_user` AS `anh`
							   			FROM `cmt`, `post`, `user` 
							   			WHERE `cmt`.`Id_post` = `post`.`Id_post` AND `cmt`.`Id_User` = `user`.`Id_User`  AND `cmt`.`Id_post` = $Id_post  
							   			ORDER BY `Id_cmt` DESC LIMIT 1";
			$requltcmt 		= $mysqli -> query($sqlcmt);
			$arcmt 			= mysqli_fetch_assoc($requltcmt);

			?>
			<div class="binhluan" id="bl-<?php echo $arcmt['Id_cmt'] ?>">
					<div class="info_binhluan">
						<img src="../files/<?php echo $arcmt['anh']; ?>">
						<p><?php echo $arcmt['name']; ?> <br/> <span>Ngày <?php echo date('m-d-Y H:i:s',$arcmt['Time_cmt']); ?></span> </p>
						<div class="clear"></div>
						<h4 id="cmt-<?php echo $arcmt['Id_cmt'] ?>"><?php echo $arcmt['Cmt']; ?></h4>
						<ul>
						<?php if($_SESSION['User']['Id_User'] == $arcmt['iduser']){  ?>
						<li>
							<a href="#" class="sua_cmt" suacmt="<?php echo $arcmt['Id_cmt']; ?>">Sửa</a>
						</li>
						<li>
							<a href="#" class="xoa_cmt" xoacmt="<?php echo $arcmt['Id_cmt']; ?>" >Xoá</a>
						</li>
						<?php }?>
						<div class="clear"></div>
					</ul>
					</div>
				</div>
			<?php
			
		}

	}