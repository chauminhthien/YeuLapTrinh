

$(document).ready(function() {
						$(window).scroll(function(){
							if($(window).scrollTop() >50){
								$('#scroll').removeClass('menu9');
								$('#scroll').addClass('scrool');
								$('.backtop').addClass('hiddenback');
							}else{
								$('#scroll').removeClass('scrool');
								$('#scroll').addClass('menu9');
								$('.backtop').removeClass('hiddenback');
							};
						});
						$('.backtop').click(function(){
							$('html, body').animate({scrollTop:0}, 500);
						});
                });

//login

				$(document).ready(function() {
                   $('.login-small').click(function(){
					   $('.login-big').toggleClass('xoara');
				   });
                });
	// end login
	// menu
			$(document).ready(function() {
					 
					
						
						   var div = $('.menu9');
						
						   var start = $(div).offset().top;
					 
						
						$.event.add(window, "scroll", function() {
							
						   var p = $(window).scrollTop();
							
						$(div).css('position',((p)>start) ? 'fixed' : 'static');
							
						$(div).css('top',((p)>start) ? '0px' : '');
						
					});
					 
					
					});
	// end menu		

$(document).ready(function(){

	$(document).on('submit','.post', function(){
		//jAlert('<img src="./templates/public/img/loading.gif" />',"red",false);
		var f = true;
		$('#name + p').text('');
		$('#email + p').text('');
		$('#phone + p').text('');
		$('#tag + p').text('');
		$('#noidung + p').text('');

		var name 		= $('#name').val();
		var email 		= $('#email').val();
		var phone 		= $('#phone').val();
		var tag 		= $('#tag').val();
		var noidung 	= $('#noidung').val();

		if(name.length < 5){
			f = false;
			$('#name + p').text('Họ và tên ít nhất 5 ký tự');
		}

		var testphone = /^0(1|9)([0-9]{8,9})$/;

		if(testphone.test(phone) == false || phone.length == 0){
			f = false;
			$('#phone + p').text('Vui Lòng nhập đúng dạng SDT di động hoặc không để trống');
		}

		if(tag.length < 5){
			f = false;
			$('#tag + p').text('ít nhất 5 ký tự');
		}

		if(noidung.length < 5){
			f = false;
			$('#noidung + p').text('ít nhất 5 ký tự');
		}

		if(f == true){
			jAlert('<img src="./templates/public/img/loading.gif" />',"red",false);
			setTimeout(function(){ 
				$.post(
					'load/themlienhe.php',
					{
						name 		: name,
						email 		: email,
						phone 		: phone,
						tag 		: tag,
						noidung 	:noidung
					},function(r){
						if(r.st == 1){
							$('.LockBody').remove();
							jAlert("Bạn Đã Gửi Thành công", "green", true);
							document.getElementById('lienhe').reset();
						}else{
							$('.LockBody').remove();
							jAlert("Có Lổi trong quá trình gửi", "red", true);
							document.getElementById('lienhe').reset();
						}

					},'json'
				);
			},500);
		}


		return false;
	});


	$(document).on('submit','.postdk',function(){

		$('#namedk + p').text('');
		$('#emaildk + p').text('');
		$('#passdk + p').text('');
		$('#phonedk + p').text('');
		$('#addressdk + p').text('');

		var namedk 			= $('#namedk').val();
		var emaildk 		= $('#emaildk').val();
		var passdk 			= $('#passdk').val();
		var phonedk 		= $('#phonedk').val();
		var addressdk 		= $('#addressdk').val();
		var gioitinh 		= $('#gioitinh').val();
		var f 				= true;


		var testphone = /^0(1|9)([0-9]{8,9})$/;

		if(testphone.test(phonedk) == false || phonedk.length == 0){
			f = false;
			$('#phonedk + p').text('Vui Lòng nhập đúng dạng SDT di động hoặc không để trống');
		}

		if(namedk.length < 10){
			f = false;
			$('#namedk + p').text('FullName ít nhất 10 ký tự');
		}

		if(passdk.length < 10){
			f = false;
			$('#passdk + p').text('PassWord ít nhất 10 ký tự');
		}

		if(addressdk.length == 0){
			f = false;
			$('#addressdk + p').text('Không được để trống');
		}

		if( f == true){
			jAlert('<img src="./templates/public/img/loading.gif" />',"red",false);
			setTimeout(function(){ 
				$.post(
					'./load/themtaikhoang.php',
					{
						namedk 		: namedk,
						emaildk 	: emaildk,
						passdk 		: passdk,
						phonedk 	: phonedk,
						addressdk 	: addressdk,
						gioitinh 	: gioitinh
					},function(r){
						console.log(r);
						if(r.st == 1){
							$('.LockBody').remove();
							jAlert("Bạn Đã đăng ký thành công", "green", true);
							document.getElementById('dangky').reset();
						}else if(r.st == 0){
							$('.LockBody').remove();
							jAlert(r.loi, "green", true);
						}else{
							$('.LockBody').remove();
							jAlert("Có Lổi trong quá trình đăng ký", "red", true);
							document.getElementById('dangky').reset();
						}

					},'json'
				);
			},500);
		}

		return false;
	});

	$(document).on('click','.khoa',function(){

		setTimeout(function(){
			$('body').append('<div class="LockBody"><div class="khoabody"><h3>Thông Báo</h3><p>Bạn cần phải đăng nhập trước khi thực hiện thao tác này</p><a href="" class="close">Đồng Ý </a></div></div>');
		},200);

		return false;
	});

	$(document).on('click','.close',function(){
		$('.LockBody').remove();
		return false;
	});

	$(document).on('click','.chuaupdate',function(){
		$('body').append('<div class="LockBody"><div class="khoabody"><h3>Thông Báo</h3><p>Hệ Thống Dang update. Vui lòng vào lại sau ! </p><a href="" class="close">Đồng Ý </a></div></div>');
		return false;
	});


	$(document).on('submit','.form',function(){
		$('body').append('<div class="LockBody"><div class="khoabody"><h3>Thông Báo</h3><p>Hệ Thống Dang update. Vui lòng vào lại sau ! </p><a href="" class="close">Đồng Ý </a></div></div>');
		return false;
	});


	$(document).on('click','#next',function(){
		
		var so 		= Number($(this).attr('page'));
		var kh 		= $(this).attr('kh');
		var tong 	= $(this).attr('tong');
		var page 	= so + 1;
		if(page <= tong){
			jAlert('<img src="./templates/public/img/loading.gif" />',"red",false);
			setTimeout(function(){
				$.post(
					'./load/phantrang.php',
					{
						page 	: page,
						kh 		: kh
					},function(data){
						$('.LockBody').remove();
						$('#next').attr('page', page);
						$('#prev').attr('page', page);
						$('#page').text(page);
						$('#Khoa_Hoc').html(data);
					}
				);
			},500);
		}
		
		return false;
	});


	$(document).on('click','#prev',function(){
		var so 		= Number($(this).attr('page'));
		var kh 		= $(this).attr('kh');
		var page 	= so - 1;
		if(page > 0){
			jAlert('<img src="./templates/public/img/loading.gif" />',"red",false);
			setTimeout(function(){
				$.post(
					'./load/phantrang.php',
					{
						page 	: page,
						kh 		: kh
					},function(data){
						$('.LockBody').remove();
						$('#prev').attr('page', page);
						$('#next').attr('page', page);
						$('#page').text(page);
						$('#Khoa_Hoc').html(data);
					}
				);
			},500);
		}
		
		return false;
	});

	$(document).on('click','body',function(){
		$('.search').removeClass('width');
		$('.ketqua').hide();
		
	});

	$(document).on('click','.search',function(){
		$(this).addClass('width');
		return false;
	});

	$('.search').keyup(function(){
		$('.ketqua').show();
		var value = $(this).val();
		$.post(
			'./load/searchvideo.php',
			{
				value : value
			},function(data){
				$('.ketqua ul').html(data);
			}
		);
		return false;
	});

});