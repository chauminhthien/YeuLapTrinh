<?php 
	session_start();
	if(isset($_SESSION['User'])){
		include './../../function/dbconnect.php';
		$id 	= $_SESSION['User']['Id_User'];
		$sql 	= "SELECT * FROM `user` WHERE `Id_User` = {$id} ";
		$reqult = $mysqli -> query($sql);
		$arUser = mysqli_fetch_assoc($reqult);

	
?>
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
<?php 
}?>