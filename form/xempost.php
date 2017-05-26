<?php
	session_start();

	if(empty($_GET) && count($_POST) == 1 && isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
		$id 		= $_POST['id'];
		$sql 		= "SELECT * FROM post WHERE Id_post = '{$id}' ";
		$reqult 	= $mysqli -> query($sql);
		$arpost 	= mysqli_fetch_assoc($reqult);
	
?>

<div class="titleuser">
	Nội Dung Bài Đăng 
	<p class="close">X</p>
</div>
<div class="info">
	<p>
		<span>
			Nội Dung
		</span>
		<?php echo $arpost['Nd_post'] ?>
	</p>
	<p>
		<span>
			Ảnh:
		</span>

		<?php
			if($arpost['Img_post'] == ""){
				echo "không có ảnh";
			 }else{ 
		?>
		<img src="../files/<?php echo $arpost['Img_post']; ?>">
		<?php }?>
		
	</p>
</div>
<?php }else{
	echo "Bạn Không Được vào";
} ?>