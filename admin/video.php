<?php
	session_start();
	if(isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
?>

<div class="userad">
  <p class="xoauserad"></p>

	<a href="#" class="them" style="float: left;" data="themvideo">Thêm Video</a>
  <div class="col-md-4">
      <select name="khoahoc" id="searchkh" class="form-control">
        <option value="0">Tất Cả Video</option>
          <?php
              $sql            = "SELECT * FROM khoahoc";
              $reqult         = $mysqli -> query($sql);
              while ($arkh    = mysqli_fetch_assoc($reqult)){
                
          ?>
              <option value="<?php echo $arkh['Id_kh']; ?>"><?php echo $arkh['Name_kh']; ?></option>
              <?php }?>
          </select>
      <p></p>
  </div>


	<table class="table table-condensed" style="margin-top: 20px;" >
  		<thead>
  			<th>
  				ID
  			</th>
  			<th style="width: 20%;">
  				Name Khoá Học
  			</th>
  			<th>
  				Tên Khoá Học
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
  		<tbody id="video">
  			<?php
		  		$sql 	= "SELECT Id_nd, Name_nd, Img_nd, Time_nd, admin.FullName AS ad, khoahoc.Name_kh AS kh  FROM noidung
									INNER JOIN admin ON noidung.Id_Ad = admin.Id_Ad
									INNER JOIN khoahoc ON noidung.Id_kh = khoahoc.Id_kh  ORDER BY Id_nd DESc";
  				$reqult 		= $mysqli -> query($sql);
  				while($arvideo 	= mysqli_fetch_assoc($reqult)){
  					$time 		= date( "Y-m-d", $arvideo['Time_nd']);

  			?>
  			<tr>
  				<td>
  					<?php echo $arvideo['Id_nd']; ?>
  				</td>
  				<td>
  					<?php echo $arvideo['Name_nd']; ?>
  				</td>
  				<td>
  					<?php echo $arvideo['kh']; ?>
  				</td>
  				<td>
  					<img style="width:100px;" src="../files/<?php echo $arvideo['Img_nd']; ?>" alt="<?php echo $arvideo['Name_nd']; ?>" />
  				</td>
  				<td>
  					<?php echo $time; ?>
  				</td>
  				<td>
  					<?php echo $arvideo['ad']; ?>
  					
  				</td>
  				<td>
  					<a href="#" class="sua" data="xemvideo" id="<?php echo $arvideo['Id_nd']; ?>" >Xem</a>
  					<a href="#" class="sua" data="suavideo" id="<?php echo $arvideo['Id_nd']; ?>" >Sửa</a>

  					<a href="#" class="xoa" data="xoavideo" id="<?php echo $arvideo['Id_nd']; ?>">Xoá</a>

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