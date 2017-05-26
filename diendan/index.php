<?php 
	include_once '../templates/diendan/inc/header.php';
?>
	<!-- header -->
	<div class="container-fuld center">
		<!-- begin left -->
		<?php 
			include_once '../templates/diendan/inc/left.php';
		?>
		<!-- end left -->
		<div class="col-md-6 content">
			<div class="form_post">
				<form action="#" method="post" id="poststt">
					<div class="top">
						<div class="img_user">
							<img src="../files/<?php echo $_SESSION['User']['Img_user'] ?>">
						</div>
						<div class="nd_post">
							<textarea rows="3" id="stt"></textarea>
						</div>
						<div class="clear"></div>
					</div>
					<div class="bottom">
						<button type="submit">Đăng</button>
						<div class="clear"></div>
					</div>
				</form>
				
			</div>
			<?php
				$sql 		= "SELECT `Id_post`, `Nd_post`, `Time_post`, `user`.`Id_User` AS `user`, `user`.`FullName` AS `fullname`, `user`.`Img_user` AS `img` 
								FROM `post`, `user` 
								WHERE `post`.`Id_User` = `user`.`Id_User`
								ORDER BY `Id_post` DESC LIMIT 0,4 ";

				$reqult 	= $mysqli -> query($sql);

				$sqldiem 	= "SELECT COUNT(`Id_post`) AS `tong` FROM `post`";
				$requltdiem = $mysqli -> query($sqldiem);
				$ardiem 	= mysqli_fetch_assoc($requltdiem);
				$tong 		= $ardiem['tong'];

				while ($arpost = mysqli_fetch_assoc($reqult)) {
					$Id_post = $arpost['Id_post'];

					
					
			?>
			<div class="baidang" id="bd-<?php echo $arpost['Id_post']; ?>">
				<p></p>
				<div class="info_baidang" post="<?php echo $arpost['Id_post']; ?>">
					<img src="../files/<?php echo $arpost['img'] ?>">
					<p><?php echo $arpost['fullname']; ?> <br/> <span>Ngày <?php echo date('d-m-Y H:i:s',$arpost['Time_post']); ?></span> </p>

					<div class="clear"></div>
					<h4 id="p-<?php echo $arpost['Id_post']; ?>"><?php echo $arpost['Nd_post']; ?></h4>
					<ul>
						<?php if($_SESSION['User']['Id_User'] == $arpost['user']){  ?>
						<li>
							<a href="#" class="sua_post" sua="<?php echo $arpost['Id_post']; ?>">Sửa</a>
						</li>
						<li>
							<a href="#" class="xoa_post" xoa="<?php echo $arpost['Id_post']; ?>" >Xoá</a>
						</li>
						<?php }?>
						<div class="clear"></div>
					</ul>
				</div>
				
				<?php 
					$sqldiemcmt 	= "SELECT COUNT(`Id_cmt`) AS tongcmt FROM `cmt` WHERE `cmt`.`Id_post` = $Id_post";
					$requltdiemcmt 	= $mysqli -> query($sqldiemcmt);
					$ardiemcmt 		= mysqli_fetch_assoc($requltdiemcmt);
					$diemcmt		= $ardiemcmt['tongcmt'];
					$limitcmt		= 0;
					if(($diemcmt - 3) >1){
						$limitcmt 		= $diemcmt - 3;
					}
					$sqlcmt 		= "SELECT `Id_cmt`, `Cmt`, `Time_cmt`,`user`.`Id_User` AS `iduser`,  `user`.`FullName` AS `name`, `user`.`Img_user` AS `anh`
							   			FROM `cmt`, `post`, `user` 
							   			WHERE `cmt`.`Id_post` = `post`.`Id_post` AND `cmt`.`Id_User` = `user`.`Id_User`  AND `cmt`.`Id_post` = $Id_post  ORDER BY `Id_cmt` ASC LIMIT $limitcmt,3";
					$sqlcmta 		= "SELECT `Id_cmt`
							   			FROM `cmt` 
							   			WHERE  `cmt`.`Id_post` = $Id_post  ORDER BY `Id_cmt` DESC LIMIT 1";
					$requltcmta 	= $mysqli -> query($sqlcmta);

					$requltcmt 		= $mysqli -> query($sqlcmt);

				if($diemcmt > 3){
					echo '<a href="" class="xemallcmt" allcmt="'. $Id_post .'"> xem tất cả các bình luận </a>';
				}else if($diemcmt < 1){
					echo 'Bạn hảy là người bình luận đầu tiên';
				}
				$arcmta = mysqli_fetch_assoc($requltcmta);


				if($requltcmt){
				while ($arcmt 	= mysqli_fetch_assoc($requltcmt)) {
						
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
				<?php }}?>
				<div class="bl"></div>
				<div class="post_cmt">
					<!-- <form action="" method="post" class="cmt_post" cmt="<?php echo $arpost['Id_post']; ?>"> -->
					<img src="../files/<?php echo $_SESSION['User']['Img_user'] ?>" />
					<input class="cmt" bl="<?php echo $arcmta['Id_cmt'] ?>"  cmt="<?php echo $arpost['Id_post']; ?>" placeholder="Viết Bình Luận">
					<div class="clear"></div>	
					<!-- </form> -->
				</div>
			</div>

			<?php } ?>
			<!-- begin cut -->
			
			<!-- end cut -->
		</div>
		<!-- begin rigth -->
		<?php 
			include_once '../templates/diendan/inc/rigth.php';
		?>
		<!-- begin rigth -->
	</div>
	<div class="clear"></div>
	




		<?php 
			include_once '../templates/diendan/inc/footer.php';
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				var load 	= 0;
				var tong 	= 0;
				tong 		= <?php echo $tong; ?>; 
				
				$(window).scroll(function(){
					if($(window).scrollTop() == $(document).height() - $(window).height()){
						load ++;
						if(load * 4 < tong){
							$.post(
								'./load/loadpost.php',
								{
									load : load
								},function(data){
									$('.content').append(data);
								}
							)
						}
					}
				});

			});
		</script>
	</body>
</html>