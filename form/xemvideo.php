<?php
	session_start();
	if(empty($_GET) && count($_POST) == 1 && isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
		$id 			= $_POST['id'];
		$sql 			= "SELECT * FROM noidung WHERE Id_nd = '{$id}' ";
		$reqult 		= $mysqli -> query($sql);
		$arxemvide 		= mysqli_fetch_assoc($reqult);
?>



<div class="titleuser">
	Video: <?php echo $arxemvide['Name_nd'] ?>
	<p class="close">X</p>
</div>
<div class="info">
	<div class="embed-responsive embed-responsive-16by9">
	      <iframe class="embed-responsive-item" src="<?php echo $arxemvide['url'] ?>"></iframe>
	</div>
</div>
<?php 
	}else{ 
?>
bạn không duoc vào
<?php }?>