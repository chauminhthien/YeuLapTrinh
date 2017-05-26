$(document).ready(function(){

	$(document).on('submit','.themvideo',function(){

		var f = true;
		$('#namevideo +p').text("");
		$('#namekhac +p').text("");
		$('#url + p').text('');
		$('#khoahoc + p').text('');
		$('#anhvideo + p').text('');

		var namevideo 		= $('#namevideo').val();
		var namekhac 		= $('#namekhac').val();
		var url 			= $('#url').val();
		var khoahoc 		= $('#khoahoc').val();
		var time 			= $('#time').val();
		var idad 			= $('#idad').val();
		var files 			= document.getElementById('anhvideo').files;

		CharSpecial = '+';

		if(namevideo.length < 10){
			f = false;
			$('#namevideo +p').text("Tên Video lớn hơn 10 ký tự");
		}

		for(var i = 0; i < CharSpecial.length; i++){
			if (namevideo.indexOf(CharSpecial[i]) > -1){
				f = false;
				$('#namevideo +p').text("Tên Video không được chứa ký kiệu +");
				break;
			}
		}

		if(namekhac.length < 10){
			f = false;
			$('#namekhac +p').text("Tên Video lớn hơn 10 ký tự");
		}

		for(var i = 0; i < CharSpecial.length; i++){
			if (namekhac.indexOf(CharSpecial[i]) > -1 || namekhac.indexOf(' ') > -1){
				f = false;
				$('#namekhac +p').text("Tên Video không được chứa ký kiệu + và khoảng trống");
				break;
			}
		}
		console.log(files[0]);

		if(f == true){

			// $('input, button, div, a, textarea, form').each(function(){
			// 	$(this).blur();
			// });

			// //Tạo một biến chứa dữ liệu post
			var dataformvideo  = namevideo;
				dataformvideo += '+' + namekhac;
				dataformvideo += '+' + time;
				dataformvideo += '+' + url;
				dataformvideo += '+' + khoahoc;
				dataformvideo += '+' + idad;

			// // Gọi hàm upload file
			 doUploadFilevideo(files[0], dataformvideo);
		}

		return false;
	});

});

function doUploadFilevideo(file, dataformvideo){
	//Khởi tạo biến Request
	var http = new XMLHttpRequest();
	http.upload.addEventListener( 'progress', function(event){

	}, false);

	var data = new FormData();

	data.append('dataformvideo', dataformvideo);

	data.append('file', file);

	http.open( 'POST', './../load/themvideo.php', false ); 
	//Gứi dữ liệu đi
	http.send(data);
		if (http.readyState == 4 && http.status == 200){

			//Phòng lỗi JSON
			try{
				//Tách kết quả về dạng JSON
				var server = JSON.parse(http.responseText);
				if (server.st == 1){ //Nếu ở file PHP đặt status == 1 để cho biết upload thành công
					//Code upload thành công
					// $('.LockBody').remove();
					jAlert(server.message, "green", true);
					$('.all').load('../admin/video.php');

				}else{//Nếu ở PHP đặt message là cho biết thông báo lỗi gì của người dùng
					jAlert(server.message, "green", true);
					$('.all').load('../admin/video.php');
				}
			}catch(e){
				jAlert(server.message, "green", true);
				$('.all').load('../admin/video.php');
			}

			//Reset lại form
			document.getElementById('addvideo').reset();
		}

		//Bỏ sự kiện upload
		http.removeEventListener( 'progress' );
	//}
}


