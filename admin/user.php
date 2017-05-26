<?php
	session_start();

	if(isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
		


?>


<div class="userad">
  <p class="xoauserad"></p>
	<?php
		if($_SESSION['FullName'] == "Admin"){


	?>
	<a href="#" class="them" data="them" them="themuser">Thêm User</a>
	<?php } ?>

	<table class="table table-condensed" style="margin-top: 20px;" >
  		<thead>
  			<th>
  				ID
  			</th>
  			<th style="width: 50%;">
  				Name
  			</th>
  			<th>
  				Chức Năng
  			</th>
  		</thead>
  		<tbody>
  			<?php
  				if($_SESSION['FullName'] == "Admin"){
  					$sql 		= "SELECT * FROM admin";
					$reqult 	= $mysqli -> query($sql);	
  				}else{
  					$id 		=  $_SESSION['Id_Users'];
  					$sql 		= "SELECT * FROM admin WHERE Id_Ad = '{$id}' ";
					$reqult 	= $mysqli -> query($sql);
  				}
  				
  				while($aruser = mysqli_fetch_assoc($reqult)){ 

  			?>
  			<tr>
  				<td>
  					<?php echo $aruser['Id_Ad']; ?>
  				</td>
  				<td>
  					<a href="#" data="user" id="<?php echo $aruser['Id_Ad']; ?>"><?php echo $aruser['FullName']; ?></a>
  				</td>
  				<td>
  					<a href="#" class="sua" data="user" id="<?php echo $aruser['Id_Ad']; ?>" >Sửa</a>
  					<?php
  						if($_SESSION['FullName'] == "Admin" && $aruser['Id_Ad'] != 1 ){ 
  					?>
  					<a href="#" class="xoa" data="xoauser" id="<?php echo $aruser['Id_Ad']; ?>">Xoá</a>
  						<?php }?>
  				</td>
  			</tr>
  			<?php }?>
  		</tbody>	
	</table>
</div>
<?php }else{
	echo "bạn khong duoc vào";
}
?>