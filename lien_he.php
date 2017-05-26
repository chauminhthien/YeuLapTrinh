<?php
	 if(!empty($_GET) && count($_GET) == 3 && isset($_GET['type'])  && isset($_GET['action']) && isset($_GET['model']) && $_GET['type'] == "lienhe" && $_GET['model'] == "do" && $_GET['action'] == "action" ){
    	include ("templates/public/inc/header.php")
?>

<section class="container bktrang">
	<div class="col-md-12">
		<div style="text-align:center" class="lienhe_title">
                <h2>Giữ liên lạc với chúng tôi</h2>
                <p class="lead">Bạn đang có ý kiến về công ty chúng tôi và muốn gửi ý kiến đó ?
                  <br>Hãy nói với chúng tôi về ý kiến đó!</p>
                <div class="row">
				
	                  <ul class="list-inline">
	                    <li><a href="# " target="_blank" class="text-muted"><i class="fa fa-facebook fa-fw fa-2x"></i></a></li>
	                    <li><a href="" target="_blank" class="text-muted"><i class="fa fa-google-plus fa-fw fa-2x"></i></a></li>
	                    <li><a href="" target="_blank" class="text-muted"><i class="fa fa-twitter fa-fw fa-2x"></i></a></li>
	                   
	                  </ul>
					
                </div>
		
	</div>
	<div class="col-md-8 noidung">

		<form method="post" class="post" data-table="post" id="lienhe">
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>Họ Và Tên (*)</label></div>
					<div class="col-md-12">
						<input type="text" name="name" id="name"  value="" placeholder="Tên *" class="form-control input" />
						<p></p>
					</div>
				</div>
			</div>
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>Email (*)</label></div>
					<div class="col-md-12">
						<input type="email" name="email" id="email"  placeholder="Email *" class="form-control input"  />
						<p></p>
					</div>
				</div>
			</div>
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>Số Điện Thoại (*)</label></div>
					<div class="col-md-12">
						<input type="text" name="phone" id="phone" placeholder="Số Điện Thoại *" class="form-control input"  />
						<p></p>
					</div>
				</div>
			</div>
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>Tiêu Đề (*)</label></div>
					<div class="col-md-12">
						<input type="text" name="tag" id="tag" placeholder="Tiêu Đề *" class="form-control input" data-required data-min="5" data-max="100" />
						<p></p>
					</div>
				</div>
			</div>
			<div class="rowUpdate">
				<div class="row">
					<div class="col-md-12"><label>Nội Dung (*)</label></div>
					<div class="col-md-12">
						<textarea id="noidung"  placeholder="Gửi Lời Nhắn cho chúng tôi *" name="noidungpost" class="form-control input" rows="15" ></textarea>
						<p></p>
						
					</div>
				</div>
			</div>
			<div class="rowFootUpdate">
				<div class="row" style="text-align: center;">
					<div id="result" class="result"></div>
					<input type="hidden" id="id" name="postid" value="<?php //echo $listpost['postid']; ?>">
					<button type="submit" id="pupu" class="lienhegui">Gửi</button>
				</div>
			</div>
		</form> 
	<script type="text/javascript" src="./templates/public/js/config.js"></script>
</div>

</section>


<?php
    include ("templates/public/inc/footer.php");
}else{
	echo "<p>Bạn Truy cập Trái phép </p>";
}
?>