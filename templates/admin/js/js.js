
$(document).ready(function() {

	$(document).on('submit','.form_login',function(){

		jAlert("<img src='../files/loading.gif' />", "red", false);

		var email = $("#email").val();

		var pass = $("#password").val();

		//console.log(email);
		//console.log(pass);
			setTimeout(function(){ 
				$.post(
			
				'../form/xulyloginad.php',
					{
						email 		: email,
						password 	: pass
					},function(r){
						//console.log(r);
						if(r.st == 1){
							$(".LockBody").remove();
							//$('#loilg').text("đúng");
							window.location.href="/YeuLapTrinh/admin/";
							//window.location.href="http://yeulaptrinh.byethost7.com/admin/";
						}else if(r.st == 0){
							
							$(".LockBody").remove();
							$('#loilg').text("Email hoặc password không đúng");
						}else{
							$(".LockBody").remove();
							$('#loilg').text("có lổi, vui lòng kiểm tra lai internet");
						}
					},'json'
				
				);
			},500);

		return false;
	});


	$(document).on('click','a[data=user]',function(){
		var id = $(this).attr('id');
		$('body').append('<div class="LockBody"><div class="infoUser"></div></div>');
		$('.infoUser').load('../form/inforuser.php', {id : id});

		

		return false;
	});


	$(document).on('click','.close',function(){

		$('.LockBody').remove();

		return false;
	});

	$(document).on('click','#searchkh',function(){

		var id = $(this).val();

		// $('#video').hide();

		$.post(
			'../load/searchkh.php',
			{
				id : id
			},function(data){
				console.log(data);
				$('#video').html(data);
			}

		);

		return false;
	});



	$(document).on('click','a[data=suauser]',function(){
		var id  = $(this).attr('id');
		
		$('.infoUser').load('../form/inforsua.php', {id : id});


		return false;
	});

	$(document).on('submit','.idsuauser',function(){
		//jAlert("<img src='../files/loading.gif' />", "red", false);
		var id = $(this).attr('id');
		$('#fullname' + ' +p').text("");
		$('#password' + ' +p').text("");

		var fullname = $('#fullname').val();




		var password = $('#password').val();
		//console.log(password);
		
		
			 //setTimeout(function(){ 
				$.post(
						"../load/loaduser.php",
						{
							fullname 	: fullname,
							password 	: password,
							id 			: id
						},function(r){
							if(r.st == 1){
								
								$('.infoUser').load('../form/inforuser.php', {id : id});
								//window.location.href="/YeuLapTrinh/admin/";				

							}else if(r.st == 0){
								//jAlertClose();
								//$(".LockBody").remove();
								$.each(r.loi,function(i,val){
									//console.log(val);
									$('#' + i + ' +p').text(val);
								})
							}else{
								$(".loilg").text("vui lòng kiểm tra lại internet");
							}
						},'json'
					);
			 //},500);
		

		return false;
	});



	$(document).on('click','a[data=xoauser]',function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);
		var id = $(this).attr('id');
		
		setTimeout(function(){ 
			$.post(
					"../load/xoauser.php?type=xoa",
					{
						id : id
					},function(r){
						//console.log(r);
						if(r.st == 1){
							$('.LockBody').remove();
							jAlert("Bạn Đã Xoá Thành Công", "green", true);
							$('.all').load("../admin/user.php");
						}else if(r.st == 0){

							$('.LockBody').remove();
							$('.xoauserad').text("có lôi trong quá trình xoá");
						}else{
							$('.LockBody').remove();
							$('.xoauserad').text("Vui Lòng Kiểm tra lai internet");
						}
					},'json'
			);
		},500);

		return false;
	});

	$(document).on('click','a[data=them]',function(){
		
		var file = $(this).attr('them');
		
		

		$('.all').load("../form/" + file + ".php");

		return false;
	});


	$(document).on('submit','.adduser',function(){
		
		$('#fullname' + " + p").text("");
		$('#email' + " + p").text("");
		$('#password' + " + p").text("");

		var f 			= true;

		var fullname 	= $('#fullname').val();

		var email 		= $('#email').val();

		var password 	= $('#password').val();

		if(fullname.length < 7){
			f = false;
			$('#fullname' + " + p").text("FullName phải lớn hơn 7 ký tự");
			
		}

		if(password.length < 7){
			f = false;
			$('#password' + " + p").text("PassWord phải lớn hơn 7 ký tự");
			
		}

		if(f == true){
			jAlert("<img src='../files/loading.gif' />", "red", false);
			setTimeout(function(){ 
				$.post(
					"../load/themuser.php",
					{
						fullname 	: fullname,
						email 		: email,
						password 	: password
					},function(r){
						//console.log(r);
						if(r.st == 1){
							jAlertClose();
							jAlert("Thêm Thành Công","green", true);
							$('.all').load('../admin/user.php');

						}else if(r.st == 0){
							jAlertClose();
							$.each(r.loi,function(i,val){
								$("#" + i + " +p").text(val);
							});

						}else{
							$("#loilg").text("Vui Lòng Kiểm Tra lại internet");
						}
					},'json'
				);
			},500);
		};

		return false;
	});



	$(document).on('submit','#addkh',function(){
		var f = true;
		$('#namekh +p').text("");
		$('#namekhac +p').text("");
		$('#anhkh + p').text('');
		$('#progress').html('');

		var namekh 		= $('#namekh').val();
		var namekhac 	= $('#namekhac').val();
		var time 		= $('#time').val();
		var idad 		= $('#idad').val();

		if(namekh.length < 10){
			f = false;
			$('#namekh + p').text("Tên Khoá học nhiều hơn 10 ký tự");
		}

		if(namekhac.length < 10){
			f = false;
			$('#namekhac + p').text("Tên Khoá học nhiều hơn 10 ký tự");
		}

		//Lấy file ở input
		var files 	= document.getElementById('anhkh').files;
		if (files.length == 0){
			f = false;
			$('#anhkh + p').text('Vui lòng chọn ảnh');
		}
		
		if(f == true){
			$('input, button, div, a, textarea, form').each(function(){
				$(this).blur();
			});

			//Tạo một biến chứa dữ liệu post
			var dataform  = namekh;
				dataform += '/' + namekhac;
				dataform += '/' + time;
				dataform += '/' + idad;

			// Gọi hàm upload file
			doUploadFile(files[0], dataform);

		}


		return false;
	});

	$(document).on('click','a[data=xoakh]',function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);
		var file 	= $(this).attr('url');
		var id 		= $(this).attr('id');
		
		setTimeout(function(){ 
			$.post(
					"../load/xoakh.php",
					{
						id : id
					},function(r){
						//console.log(r);
						if(r.st == 1){
							$(".LockBody").remove();
							jAlert("Xoá Thành Công", "green", true);
							$(".all").load("../admin/khoahoc.php");

						}else{
							$(".LockBody").remove();
							jAlert("Vui lòng kiểm tra lai đường truyền internet", "red", true);
						}
					},'json'
				);
		},500);

		return false;
	});

	$(document).on('click', 'a[data=sua]',function(){
		var id 		= $(this).attr('id');
		var file 	= $(this).attr('url');

		$('.all').load('../form/' + file + '.php', {id : id});

		return false;
	});


	$(document).on('click','a[data=xem]',function(){
		var id 		= $(this).attr('id');
		var file 	= $(this).attr('url');
		$('body').append('<div class="LockBody"><div class="infoUser"></div></div>');
		$('.infoUser').load('../form/xemlh.php', {id : id});

		return false;
	});

	$(document).on('click','a[data=suapost]',function(){

		var id 		= $(this).attr('id');
		$('body').append('<div class="LockBody"><div class="infoUser"></div></div>');
		$('.infoUser').load('../form/xempost.php', {id : id});
		return false;
	});

	$(document).on('click','a[data=xemvideo]',function(){
		var id 		= $(this).attr('id');
		$('body').append('<div class="LockBody"><div class="infoUser"></div></div>');
		$('.infoUser').load('../form/xemvideo.php', {id : id});
		return false;
	});

	$(document).on('click','a[data=themvideo]',function(){

		$('.all').load('../form/themvideo.php');

		return false;
	});

	$(document).on('click','a[data=xemtk]',function(){
		var id 		= $(this).attr('id');
		$('body').append('<div class="LockBody"><div class="infoUser"></div></div>');
		$('.infoUser').load('../form/xemtk.php', {id : id});

		return false;
	});

	$(document).on('click','a[data=suavideo]',function(){

		var id = $(this).attr('id');
		$('.all').load('../form/suavideo.php', {id : id});

		return false;
	});

	$(document).on('click','a[data=xoa]',function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);
		var id 		= $(this).attr('id');
		setTimeout(function(){ 
			$.post(
				'../load/xoalh.php',
				{
					id :id
				},function(r){
					if(r.st == 1){
						$('.LockBody').remove();
						jAlert("Bạn Xoá Thành Công","green", true);
						$('.all').load('../admin/lienhe.php');

					}else if(r.st == 0){
						$('.LockBody').remove();
						jAlert("Có lổi trong quá trình xoá","red", true);
						$('.all').load('../admin/lienhe.php');
					}else{
						$('.LockBody').remove();
						jAlert("Vui lòng kiểm tra lai internet","red", true);
						$('.all').load('../admin/lienhe.php');
					}
				},'json'
			);
		},500);


		return false;
	});


	$(document).on('click','a[data=xoavideo]',function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);
		var id = $(this).attr('id');
		setTimeout(function(){ 
			$.post(
				'../load/xoavideo.php',
				{
					id : id
				}, function(r){
					if(r.st == 1){
						$('.LockBody').remove();
						jAlert("Đã xoá Thành công", "green", true);
						$('.all').load('../admin/video.php');
					}else if(r.st == 0){
						$('.LockBody').remove();
						jAlert("Có Lổi trong quá Trình Xoá", "red", true);
						$('.all').load('../admin/video.php');
					}else{
						$('.LockBody').remove();
						jAlert("Vui Lòng Kiễm Tra lai Internet", "red", true);
						$('.all').load('../admin/video.php');
					}
				},'json'
			);
		},500);

		return false;
	});

	$(document).on('click','a[data=xoatk]',function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);
		var id = $(this).attr('id');
		setTimeout(function(){ 
			$.post(
				'../load/xoatk.php',
				{
					id : id
				},function(r){
					if(r.st == 1){
						$('.LockBody').remove();
						jAlert("Bạn Xoá Thành Công","green", true);
						$('.all').load('../admin/taikhoang.php');
					}else if(r.st == 0){
						$('.LockBody').remove();
						jAlert("Có lổi trong quá trình xoá","red", true);
						$('.all').load('../admin/taikhoang.php');
					}else{
						$('.LockBody').remove();
							jAlert("Vui lòng kiểm tra lai internet","red", true);
							$('.all').load('../admin/taikhoang.php');
					}
				},'json'
			);
		},500);

		return false;
	});

	$(document).on('click','a[data=xoapost]',function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);
		var id = $(this).attr('id');
		setTimeout(function(){ 
			$.post(
				'../load/xoapost.php',
				{
					id : id
				},function(r){
					if(r.st == 1){
						$('.LockBody').remove();
						jAlert("Bạn Xoá Thành Công","green", true);
						$('.all').load('../admin/diendan.php');
					}else if(r.st == 0){
						$('.LockBody').remove();
						jAlert("Có Lổi Trong Quá Trình Xoá","red", true);
						$('.all').load('../admin/diendan.php');
					}else{
						$('.LockBody').remove();
						jAlert("Vui Lòng Kiểm Tra Lại Internet","red", true);
						$('.all').load('../admin/diendan.php');
					}
				},'json'
			);
		},500);

		return false;
	});


	$(document).on('click','a[data=xacnhan]',function(){
		jAlert("<img src='../files/loading.gif' />", "red", false);
		var id = $(this).attr('id');
		setTimeout(function(){ 
			$.post(
				'../load/xacnhanpost.php',
				{
					id : id
				},function(r){
					console.log(r);
					if(r.st == 1){
						$('.LockBody').remove();
						jAlert("Xác Nhận Thánh Công","green", true);
						$('.all').load('../admin/diendan.php');
					}else if(r.st == 0){
						$('.LockBody').remove();
						jAlert("Có Lỗi Trong Quá Trình Xoá","red", true);
						$('.all').load('../admin/diendan.php');
					}else{
						$('.LockBody').remove();
						jAlert("Vui Lòng Kiểm Tra lại Internet","red", true);
						$('.all').load('../admin/diendan.php');
					}
				},'json'
			);
		},500);

		return false;
	});

	$(document).on('click','a[data=canxn]',function(){

		$('.all').load('../admin/diendan.php?type=canxacnhan');
		return false;
	});
});









function doUploadFile(file, dataform){
	//Khởi tạo biến Request
	var http = new XMLHttpRequest();

	//Lấy thẻ Progress
	var progress = document.getElementById('progress');

	//Tạo thẻ Progress Child
	var progressChild = document.createElement('div');
		//add class cho Progress Child
		progressChild.className = 'progressChild';

	// Tạo thẻ Progress Bar
	var progressBar = document.createElement('div');
		//add class cho Progress Bar
		progressBar.className = 'progressBar';

	// Tạo thẻ Progress Text
	var progressText = document.createElement('div');
		//add class cho Progress Text
		progressText.className = 'progressText';

	// Thêm Div.ProgressBar và Div.ProgressText vào Div.ProgressChild
	progressChild.appendChild(progressBar);
	progressChild.appendChild(progressText);

	// Thêm Div.progressChild vào Div#progress
	progress.appendChild(progressChild);

	//Mở sự kiện upload của biến http, tên sự kiện là progress, và lấy progress về cho event
	http.upload.addEventListener( 'progress', function(event){
		//Lấy tên file
		var fileName = file.name;

		//Lấy dung lượng đã upload
		var fileLoaded = event.loaded;

		//Lấy dung lượng file phải upload
		var fileSize = event.total;

		//Tính tiến trình đã upload, có thể file size bằng 0 nên tính ko dc, nếu tính ko dc thì lấy giá trị là 0;
		var fileProgress = parseInt((fileLoaded / fileSize) * 100) || 0;

		//Hiển thị progress lên trình duyệt
		progressBar.innerHTML = fileName + ' đang được upload...';
		progressBar.style.width = fileProgress + '%';
		progressBar.style.background = '#337ab7';
		progressText.innerHTML = fileProgress + '%';
	}, false);

	//Bắt đầu upload
	//Tạo biến chứa dữ liệu
	var data = new FormData();

	//Add data form vào để gửi đi
	data.append('dataform', dataform);

	//Add file vào để gửi đi
	data.append('file', file);

	//Mở request để gửi đi với kiểu POST, với không đồng bộ
	http.open( 'POST', './../load/themkhoahoc.php', false ); // sao lại có 2 dấu chấm. em cho ra thu muc dau roi di vao,

	//Gứi dữ liệu đi
	http.send(data);
	// console.log(http);
	// console.log(data);
	//Nhận dữ liệu về
	//http.onreadystatechange = function(event){
		//Kiểm tra điều kiện thành công
		if (http.readyState == 4 && http.status == 200){
			//Bỏ background đang xư lý của Div.progressBar
			progressBar.style.background = '';

			//Phòng lỗi JSON
			try{
				//Tách kết quả về dạng JSON
				var server = JSON.parse(http.responseText);
				//console.log(http.responseText);
				if (server.status == 1){ //Nếu ở file PHP đặt status == 1 để cho biết upload thành công
					//Code upload thành công
					progressBar.innerHTML = server.message;
					progressBar.style.background = 'green';

				}else{//Nếu ở PHP đặt message là cho biết thông báo lỗi gì của người dùng
					//Code thông báo lỗi
					progressBar.innerHTML = server.message;
					progressBar.style.background = 'red';
				}
			}catch(e){
				//Code lỗi do trình duyệt hoặc lỗi do lập trình
				progressBar.innerHTML = 'Có lỗi xảy ra';
				progressBar.style.background = 'red';
			}

			//Reset lại form
			document.getElementById('addkh').reset();
		}

		//Bỏ sự kiện upload
		http.removeEventListener( 'progress' );
	//}
}