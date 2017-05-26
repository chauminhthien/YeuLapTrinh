<?php 
	if(isset($_SESSION['User'])){

		$id 	= $_SESSION['User']['Id_User'];
		$sql 	= "SELECT * FROM `user` WHERE `Id_User` = {$id} ";
		$reqult = $mysqli -> query($sql);
		$arUser = mysqli_fetch_assoc($reqult);

	}
?>

<div class="col-md-3 left">
			<div class="top-canhan">
				<div class="col-md-4">
					<img src="../files/<?php echo $arUser['Img_user']; ?>" class="img-responsive" />	
				</div>
				<div class="col-md-8">
					<a href="infouser.php?id=<?php echo $arUser['Id_User']; ?>"> <?php echo $arUser['FullName']; ?></a>
				</div>
			<div class="clear"></div>
			<a href="#" id="suaimgcanhan">Thay Đổi</a>
			</div>
			<div class="info-canhan">
				<h2>Infomation User</h2>
				<ul>
					<li>
						<p class="indam">FullName</p>
						<p><?php echo $arUser['FullName']; ?></p>
					</li>
					<li>
						<p class="indam">Email</p>
						<p><?php echo $arUser['Email']; ?></p>
					</li>
					<li>
						<p class="indam">Sex</p>
						<p><?php echo $arUser['GioiTinh']; ?></p>
					</li>
					<li>
						<p class="indam">Phone</p>
						<p><?php echo $arUser['Phone']; ?></p>
					</li>
					<li>
						<p class="indam">Address</p>
						<p><?php echo $arUser['Address']; ?></p>
					</li>
					<li>
						<p class="indam">Ngày Đăng Ký</p>
						<p><?php echo date('d-m-Y',$arUser['Time']); ?></p>
					</li>
				</ul>
				<a href="#" id="suainfocanhan" canhan="<?php echo $id; ?>">Sửa</a>
			</div>

		<div class="clear"></div>
		</div>