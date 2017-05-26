$(document).ready(function() {
						$(window).scroll(function(){
							if($(window).scrollTop() >50){
								$('.backtop').addClass('hiddena');
							}else{
								$('.backtop').removeClass('hiddena');
							};
						});
						$('.backtop').click(function(){
							$('html, body').animate({scrollTop:0}, 500);
						});

	$('.thongtin').load('./load/thongtin.php');

	$(document).on('submit', '#login', function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);

		$('#loilogin').text('');
		var email 	= $('#email').val();
		var pass 	= $('#pass').val();
		var file 	= $(this).attr('file');

		setTimeout(function(){ 
			$.post(
				'./load/login.php',
				{
					email 	: email,
					pass 	: pass
				},function(data){
					if(data.st == 1){
						if(file == 'home'){
							window.location.href="../index.php?type=index&model=do&action=action";
						}else if(file == 'diendan'){
							window.location.href="../diendan/";
						}else{
							$(".LockBody").remove();
						
						jAlert('Bạn Truy cập Trái Phép',"red", true);
						}
						
						//window.location.href="http://yeulaptrinh.byethost7.com/admin/";
					}else{
						$(".LockBody").remove();
						//$('#loilogin').text('Thông Tin đăng nhập không Đúng');
						$('#email').val('');
						$('#pass').val('');
						jAlert(data.mes,"red", true);

					}
				},'json'
			);
		},500);
		return false;
	});

	$(document).on('submit','#poststt',function(){
		var stt = $('#stt').val();
		if(stt.length >=1){
			jAlert("<img src='../files/loading.gif' />", "red", false);
			setTimeout(function(){
				$.post(
					'./load/poststt.php',
					{
						poststt : stt
					},function(data){
						if(data.st == 1){
							//$(".LockBody").remove();
							window.location.href="../diendan/";

						}else{
							$(".LockBody").remove();
							jAlert('vui lòng kiểm tra lại đường truyền InterNet', "red", true);
						}
					},'json'
				);
			},500);
		}

		return false;
	});

	$(document).on('click','.sua_post',function(){
		$('body').append('<div class="LockBody"><div class="textbox"></div></div>');
		var id = $(this).attr('sua');
		console.log(id);
		$('.textbox').load('./form/suapost.php',{id: id});
		return false;
	});

	$(document).on('click', '.Close',function(){
		$('.LockBody').remove();
		return false;
	});

	$(document).on('submit','.form_sua_post', function(){
		var post 	= $('#sua_post').val();
		var id 		= $(this).attr('suapost');
		if(post.length >= 1){
			$.post(
				'./load/suapost.php',
				{
					id 		: id,
					post 	: post
				},function(data){
					if(data.st == 1){

						$('.LockBody').remove();
						$('#p-' + id).text(data.mes);
					}else{
						$(".LockBody").remove();
						jAlert('vui lòng kiểm tra lại đường truyền InterNet', "red", true);
					}
				},'json'
			);
		}else{
			$('.LockBody').remove();
		}
		return false;
	});

	$(document).on('click','.xoa_post',function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);
		var id = $(this).attr('xoa');
		setTimeout(function(){ 
			$.post(
				'./load/xoapost.php',
				{
					id : id
				},function(data){
					if(data.st == 1){
						$(".LockBody").remove();
						$('#bd-' + id).remove();
						$('#cauhoi').text(data.choi).append('<span> Câu Hỏi</span>');
						$('#binhluan').text(data.bl).append('<span> Bình Luận</span>');
					}else{
						$(".LockBody").remove();
						jAlert('vui lòng kiểm tra lại đường truyền InterNet', "red", true);
					}
				},'json'
			);
		},500);
		return false;
	});

	$(document).on('keyup','.cmt',function(e){

		if(e.keyCode == 13){
			var bl 	= Number($(this).attr('bl'));
			var cmt = $(this).val();
			var id 	= $(this).attr('cmt');

			if(cmt.length > 0){
				$.post(
					'./load/cmt.php',
					{
						cmt 	: cmt,
						id 		: id
					},function(data){
						if(bl>0){
							//$('#bd-' + id + ' #bl-' + bl).append(data);
							$('#bd-' + id + ' .bl').append(data);

						}else{
							$('#bd-' + id + ' .bl').append(data);
						}
						$('.thongtin').load('./load/thongtin.php');
						$('.cmt').val('');
					}
				);
			}
			
 		}
		return false;
	});

	$(document).on('click','.sua_cmt',function(){
		$('body').append('<div class="LockBody"><div class="textbox"></div></div>');
		var id = $(this).attr('suacmt');
		$('.textbox').load('./form/suacmt.php',{id: id});
		return false;
	});


	$(document).on('submit','.form_sua_cmt', function(){
		var cmt 	= $('#sua_cmt_post').val();
		var id 		= $(this).attr('suacmt');
		if(cmt.length >= 1){
			$.post(
				'./load/suacmt.php',
				{
					id 		: id,
					cmt 	: cmt
				},function(data){
					if(data.st == 1){

						$('.LockBody').remove();
						$('h4#cmt-' + id).text(data.mes);
					}else{
						$(".LockBody").remove();
						jAlert('vui lòng kiểm tra lại đường truyền InterNet', "red", true);
					}
				},'json'
			);
		}else{
			$('.LockBody').remove();
		}
		return false;
	});

	$(document).on('click','.xoa_cmt',function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);
		var id = $(this).attr('xoacmt');
		setTimeout(function(){
			$.post(
				'./load/xoacmt.php',
				{
					id : id
				},function(data){
					if(data.st == 1){
						$('#bl-' + id).html('').removeClass('binhluan');
						$('.LockBody').remove();
						$('.thongtin').load('./load/thongtin.php');
					}else{
						$(".LockBody").remove();
						jAlert('vui lòng kiểm tra lại đường truyền InterNet', "red", true);
					}
				},'json'
			);
		},500);

		return false;
	});

	$(document).on('click','.xemallcmt',function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);
		var id = $(this).attr('allcmt');
		setTimeout(function(){
			$.post(
				'./load/xemallcmt.php',
				{
					id : id
				},function(data){
					$('#bd-' + id + ' .binhluan').remove();
					$('.xemallcmt').remove();
					$('#bd-' + id + ' .info_baidang').append(data);
					$('.LockBody').remove();

				}
			);
		},500);
		return false;
	});

	$(document).on('click','#suaimgcanhan',function(){
		$('.top-canhan').append('<form method="post" class="suaimg"></form>');
		$('.suaimg').append('<input name="imgcanhan" id="imgcanhan" type="file" accept="image/x-png, image/png, image/gif, image/jpeg" required="required" />');
		$('.suaimg').append('<div class="rowBottom"><button type="submit">Cập Nhật</button></div>'); 
		$('.suaimg').append('<div class="clear"></div>');
		$('#suaimgcanhan').remove();
		return false;
	});

	$(document).on('submit','.suaimg', function(){
		var files 			= document.getElementById('imgcanhan').files;
		 doUploadFilevideo(files[0]);
		return false;
	});

	$(document).on('click', '#suainfocanhan', function(){
		var id = $(this).attr('canhan');
		$('.info-canhan').load('./form/suainfo.php',{id : id});
		
		return false;
	});

	$(document).on('click','.cancel', function(){
		$('.info-canhan').load('./form/left.php');
		return false;
	});

	$(document).on('submit','.form_sua_infor', function(){
		$('#password + p').text('');
		$('#phone + p').text('');
		var f = true;
		var fullname 	= $('#fullname').val();
		var password 	= $('#password').val();
		var gioitinh 	= $('#gioitinh').val();
		var phone 		= $('#phone').val();
		var address 	= $('#address').val();
		var id 			= $(this).attr('suainfor');

		 var ktphone = /^0(1|9)([0-9]{8,9})$/;
		 if(ktphone.test(phone) == false){
		 	f = false;
		 	$('#phone + p').text('Vui lòng nhập đúng số điện thoại');
		 }
		 if(f == true){
		 	jAlert("<img src='../files/loading.gif' />", "red", false);
		 	setTimeout(function(){
		 		$.post(
		 			'./load/suainfo.php',
		 			{
		 				id 			: id,
		 				fullname 	: fullname,
		 				password 	: password,
		 				gioitinh 	: gioitinh,
		 				phone 		: phone,
		 				address 	: address 
		 			},function(data){
		 				if(data.st == 1){

		 					window.location.href="../diendan/";
		 				}else{
		 					$(".LockBody").remove();
							jAlert('vui lòng kiểm tra lại đường truyền InterNet', "red", true);
		 				}
		 			},'json'
		 		);	
		 	},500);
		 	
		 }

		
		return false;
	});
});

function doUploadFilevideo(file){
	//Khởi tạo biến Request
	var http = new XMLHttpRequest();
	http.upload.addEventListener( 'progress', function(event){

	}, false);

	var data = new FormData();
	data.append('file', file);

	http.open( 'POST', './load/suaimgcanhan.php', false ); 
	//Gứi dữ liệu đi
	http.send(data);

	console.log(http);
	console.log(data)
		if (http.readyState == 4 && http.status == 200){

			//Phòng lỗi JSON
			try{
				//Tách kết quả về dạng JSON
				var server = JSON.parse(http.responseText);
				console.log(server);
				//console.log(http.responseText);
				if (server.st == 1){ //Nếu ở file PHP đặt status == 1 để cho biết upload thành công
					//Code upload thành công
					window.location.href="../diendan/";
					

				}else{//Nếu ở PHP đặt message là cho biết thông báo lỗi gì của người dùng
					jAlert("có lỗi Xay ra", "green", true);
				}
			}catch(e){
				jAlert("có lỗi Xay ra", "green", true);
				// $('.all').load('../admin/video.php');
			}

		}

		//Bỏ sự kiện upload
		//http.removeEventListener( 'progress' );
	//}
}