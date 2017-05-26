<?php 
	session_start();
	if(isset($_SESSION['User'])){
		include './../../function/dbconnect.php';
		$id 	= $_SESSION['User']['Id_User'];
		$sql 	= "SELECT * FROM `user` WHERE `Id_User` = {$id} ";
		$reqult = $mysqli -> query($sql);
		$arUser = mysqli_fetch_assoc($reqult);

	}
?>
<h2>Infomation User</h2>
<form class="form_sua_infor" method="post" action="" suainfor="<?php echo $id ?>">
				<ul>
					<li>
						<p class="indam">FullName</p>
						<input type="text"  class="form-control" id="fullname" value="<?php echo $arUser['FullName']; ?>" required="required" />	
						<p></p>
					</li>
					<li>
						<p class="indam">Email</p>
						<p><?php echo $arUser['Email']; ?></p>
					</li>
					<li>
						<p class="indam">PassWord</p>
						<input type="password"  class="form-control" id="password"  />	
						<p></p>
					</li>
					<li>
						<p class="indam">Sex</p>
						<select id="gioitinh" class="form-control">
							<option value="<?php echo $arUser['GioiTinh']; ?>" ><?php echo $arUser['GioiTinh']; ?></option>
							<option value="Nam" >Nam</option>
							<option value="Nữ">Nữ</option>
						</select>
					</li>
					<li>
						<p class="indam">Phone</p>
						<input type="text"  class="form-control" id="phone" value="<?php echo $arUser['Phone']; ?>" />
						<p></p>
					</li>
					<li>
						<p class="indam">Address</p>
						<input type="text"  class="form-control" id="address" value="<?php echo $arUser['Address']; ?>" required="required" />
						<p></p>
					</li>
					<li>
						<p class="indam">Ngày Đăng Ký</p>
						<p><?php echo date('d-m-Y',$arUser['Time']); ?></p>
					</li>
				</ul>
				<div class="rowBottom">
					<button type="submit">Cập Nhật</button>
					<button class="cancel">Close</button>
				</div>
				<div class="clear"></div>
			</form>