<?php
	session_start();
	if(isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
?>

<div class="userad">
  <p class="xoauserad"></p>

	<a href="#" class="them" data="them" them="themkhoahoc">Thêm Khoá Học</a>
  


	<table class="table table-condensed" style="margin-top: 20px;" >
  		<thead>
  			<th>
  				ID
  			</th>
  			<th style="width: 20%;">
  				Name Khoá Học
  			</th>
  			<th>
  				Ảnh
  			</th>
  			<th>
  				Thời Gian
  			</th>
  			<th>
  				Người Đăng
  			</th>
  			<th>
  				Chức Năng
  			</th>
  		</thead>
  		<tbody>
  			<?php
  				$sql = "SELECT Id_kh, Name_kh, Img_kh, time, admin.FullName AS FullName FROM `khoahoc` INNER JOIN admin ON khoahoc.Id_Ad = admin.Id_Ad";
  				$reqult = $mysqli -> query($sql);
  				while($arkhoahoc = mysqli_fetch_assoc($reqult)){

  					$time = date( "Y-m-d", $arkhoahoc['time']);

  			?>
  			<tr>
  				<td>
  					<?php echo $arkhoahoc['Id_kh']; ?>
  				</td>
  				<td>
  					<?php echo $arkhoahoc['Name_kh']; ?>
  				</td>
  				<td>
  					<img style="width:100px;" src="../files/<?php echo $arkhoahoc['Img_kh']; ?>" alt="<?php echo $arkhoahoc['Name_kh']; ?>" />
  				</td>
  				<td>
  					<?php echo $time; ?>
  				</td>
  				<td>
  					<?php echo $arkhoahoc['FullName']; ?>
  					
  				</td>
  				<td>
  					<a href="#" class="sua" data="sua" url="suakh" id="<?php echo $arkhoahoc['Id_kh']; ?>" >Sửa</a>

  					<a href="#" class="xoa" data="xoakh" url="xoakh" id="<?php echo $arkhoahoc['Id_kh']; ?>">Xoá</a>

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