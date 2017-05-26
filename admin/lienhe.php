<?php
	session_start();
	if(isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
?>

<div class="userad">
	<table class="table table-condensed" style="margin-top: 20px;" >
  		<thead>
  			<th>
  				ID
  			</th>
  			<th style="width: 50%;">
  				Người Liên hệ
  			</th>
  			<th>
  				Chức Năng
  			</th>
  		</thead>
  		<tbody>
  			<?php
  				$sql = "SELECT * FROM lienhe";
  				$reqult = $mysqli -> query($sql);
  				while($arlienhe = mysqli_fetch_assoc($reqult)){

  			?>
  			<tr>
  				<td>
  					<?php echo $arlienhe['Id_lh']; ?>
  				</td>
  				<td>
  					<?php  echo $arlienhe['FullName']; ?>
  				</td>
  				<td>
  					<a href="#" class="sua" data="xem" url="xemlh" id="<?php  echo $arlienhe['Id_lh']; ?>" >Xem</a>

  					<a href="#" class="xoa" data="xoa" url="xoalh" id="<?php echo $arlienhe['Id_lh']; ?>">Xoá</a>

  				</td>
  			</tr>
  			<?php }?>
  		</tbody>	
	</table>
</div>
<?php }else{
	echo "ban khong duoc vào";
}
?>