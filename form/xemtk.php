<?php
	session_start();

	if(empty($_GET) && count($_POST) == 1 && isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
		$id 		= $_POST['id'];
		$sql 		= "SELECT * FROM user WHERE Id_User = '{$id}' LIMIT 1";
		$reqult 	= $mysqli -> query($sql);
		$artk 	= mysqli_fetch_assoc($reqult);
	
?>

<div class="titleuser">
	Thông Tin Tài Khoản Người Dùng 
	<p class="close">X</p>
</div>
<div class="info">
	<p>
		<span>
			FullName
		</span>
		<?php echo $artk['FullName']; ?>
	</p>
	<p>
		<span>
			Email:
		</span>
		<?php echo $artk['Email']; ?>
	</p>
	<p>
		<span>
			Phone:
		</span>
		<?php echo $artk['Phone']; ?>
	</p>
	<p>
		<span>
			Address:
		</span>
		<?php echo $artk['Address']; ?>
	</p>
	<p>
		<span>
			Giới Tính:
		</span>
		<?php echo $artk['GioiTinh']; ?>
	</p>
	<p>
		<span>
			Thời Gian Đăng Ký:
		</span>
		<?php echo date('Y-m-d',$artk['Time']);?>
	</p>
	<p>
		<span>
			Ảnh Đại Diện:
		</span>

		<?php
			if($artk['Img_user'] == ""){
				echo "không có ảnh";
			 }else{ 
		?>
		<img src="../files/<?php echo $artk['Img_user']; ?>" class="img_tk">
		<?php }?>
		
	</p>
</div>
<?php }else{
	echo "Bạn Không Được vào";
} ?>