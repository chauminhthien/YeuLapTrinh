<?php
	if(!empty($_GET) && count($_GET) == 3 && isset($_GET['type'])  && isset($_GET['action']) && isset($_GET['model']) && $_GET['type'] == "dangky" && $_GET['model'] == "do" && $_GET['action'] == "action" ){
    include ("templates/public/inc/header.php");
?>

<section class="container bktrang">
	<div class="col-md-12">
		<div style="text-align:center" class="lienhe_title">
                <h2>Thông Tin Đăng Ký</h2>
                <p class="lead">Hãy Nhanh Tay đăng ký đễ trở thành một thành viên của chúng tôi</p>
                <div class="row">
				
                  <ul class="list-inline">
                    <li><a href="# " target="_blank" class="text-muted"><i class="fa fa-facebook fa-fw fa-2x"></i></a></li>
                    <li><a href="" target="_blank" class="text-muted"><i class="fa fa-google-plus fa-fw fa-2x"></i></a></li>
                    <li><a href="" target="_blank" class="text-muted"><i class="fa fa-twitter fa-fw fa-2x"></i></a></li>
                   
                  </ul>
					
                </div>
		
	</div>
	<div class="col-md-8 noidung">

		<form method="post" class="postdk" data-table="post" id="dangky">
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>Họ Và Tên (*)</label></div>
					<div class="col-md-12">
						<input type="text" name="name" id="namedk"  value="" placeholder="Tên *" class="form-control input" data-required data-min="5" data-max="100" />
						<p></p>
					</div>
				</div>
			</div>
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>Email (*)</label></div>
					<div class="col-md-12">
						<input type="email" name="emaildk" id="emaildk"  placeholder="Email *" class="form-control input" data-required data-min="5" data-max="100" />
						<p></p>
					</div>
				</div>
			</div>
			
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>PassWord (*)</label></div>
					<div class="col-md-12">
						<input type="password" name="pass" id="passdk" placeholder="PassWord (*)" class="form-control input" data-required data-min="5" data-max="100" />
						<p></p>
					</div>
				</div>
			</div>
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>Số Điện Thoại (*)</label></div>
					<div class="col-md-12">
						<input type="text" name="phone" id="phonedk" placeholder="Số Điện Thoại *" class="form-control input" data-required data-min="5" data-max="100" />
						<p></p>
					</div>
				</div>
			</div>
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>Địa Chỉ (*)</label></div>
					<div class="col-md-12">
						<input type="text" name="phone" id="addressdk" placeholder="Địa chỉ (*)" class="form-control input" data-required data-min="5" data-max="100" />
						<p></p>
					</div>
				</div>
			</div>
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>Giới Tính (*)</label></div>
					<div class="col-md-12">
						<select id="gioitinh" class="form-control">
							
							<option value="Nam" selected="selected">Nam</option>
							<option value="Nữ">Nữ</option>
						</select>
					</div>
				</div>
			</div>
			<div class="rowFootUpdate">
				<div class="row" style="text-align: center;">
					<div id="result" class="result"></div>
					<input type="hidden" id="id" name="postid" value="<?php //echo $listpost['postid']; ?>">
					<button type="submit" id="guidk" class="dangky">Đăng Ký</button>
				</div>
			</div>
		</form> 
	<script type="text/javascript" src="./templates/public/js/config.js"></script>
</div>

</section>


<?php
    include ("templates/public/inc/footer.php");
}else{
	echo "Bạn truy cập trái phép";
}
?>