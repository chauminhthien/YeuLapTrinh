<?php
	session_start();

	if(isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
		


?>


<div class="userad">
  <p class="xoauserad"></p>
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
  					$sql 		= "SELECT * FROM user";
					$reqult 	= $mysqli -> query($sql);
  				
  				while($aruser = mysqli_fetch_assoc($reqult)){ 
  			?>
  			<tr>
  				<td>
  					<?php echo $aruser['Id_User']; ?>
  				</td>
  				<td>
  					<a href="" data="xemtk" id="<?php echo $aruser['Id_User']; ?>"><?php echo $aruser['FullName']; ?></a>
  				</td>
  				<td>
  					<a href="" class="xoa" data="xoatk" id="<?php echo $aruser['Id_User']; ?>">Xoá</a>

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