<?php
	session_start();

	if(empty($_GET) && count($_POST) == 1 && isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
		$id 		= $_POST['id'];
		$sql 		= "SELECT * FROM lienhe WHERE Id_lh = '{$id}' ";
		$reqult 	= $mysqli -> query($sql);
		$arlienhe 	= mysqli_fetch_assoc($reqult);

		$time = date('Y-m-d', $arlienhe['time']);


	
?>

<div class="titleuser">
	Thông Tin Liên Hệ 
	<p class="close">X</p>
</div>
<div class="info">
	<p>
		<span>
			FullName:
		</span>
		<?php echo $arlienhe['FullName'] ?>
	</p>
	<p>
		<span>
			Email:
		</span>
		<?php echo $arlienhe['Email'] ?>
	</p>
	<p>
		<span>
			Phone:
		</span>
		<?php echo $arlienhe['Phone'] ?>
	</p>
	<p>
		<span>
			Tiêu Đề:
		</span>
		<?php echo $arlienhe['Tag'] ?>
	</p>
	<p>
		<span>
			Nội Dung:
		</span>
		<?php echo $arlienhe['Noi_dung'] ?>
	</p>
	<p>
		<span>
			Thời Gian:
		</span>
		<?php echo $time ?>
	</p>
	<a href="#" class="xoa" data="xoa" url="xoalh" id="<?php //echo $arlienhe['Id_lh']; ?>">Xoá</a>
</div>
<?php }else{
	echo "Bạn Không Được vào";
} ?>