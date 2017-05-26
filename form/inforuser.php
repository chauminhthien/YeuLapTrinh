<?php
	session_start();

	if(empty($_GET) && count($_POST) == 1 && isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
		$id 		= $_POST['id'];
		$sql 		= "SELECT * FROM admin WHERE Id_Ad = '{$id}' ";
		$reqult 	= $mysqli -> query($sql);
		$arUser 	= mysqli_fetch_assoc($reqult);

	
?>

<div class="titleuser">
	Thông Tin Cá Nhân 
	<p class="close">X</p>
</div>
<div class="info">
	<p>
		<span>
			FullName:
		</span>
		<?php echo $arUser['FullName'] ?>
	</p>
	<p>
		<span>
			Email:
		</span>
		<?php echo $arUser['Email'] ?>
	</p>
	<a href="" data="suauser" id="<?php echo $arUser['Id_Ad'] ?>">Sửa</a>
</div>
<?php }else{
	echo "Bạn Không Được vào";
} ?>