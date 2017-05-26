$(document).ready(function(){

	$(document).on('submit','.suakh',function(){
		
		var f = true;
		$('#namekh +p').text("");
		$('#namekhac +p').text("");
		$('#anhkh + p').text('');
		$('#progress').html('');

		var namekh 		= $('#namekh').val();
		var namekhac 	= $('#namekhac').val();
		var time 		= $('#time').val();
		var idad 		= $('#idad').val();
		var id 			= $(this).attr('data-id');

		if(namekh.length < 10){
			f = false;
			$('#namekh + p').text("Tên Khoá học nhiều hơn 10 ký tự");
		}

		 //var pt 		= /^([a-zA-Z0-9]{10,50})+$/;
		CharSpecial = '~!@#$%^&*()_+`1234567890=[]{}|;:",./<>?';

		

		for (var i = 0; i < CharSpecial.length; i++){
			if (namekhac.indexOf(CharSpecial[i]) > -1 || namekhac.indexOf("'") > -1 || namekhac.indexOf(" ") > -1 || namekhac.indexOf('\\') > -1){
				f = false;
				$('#namekhac + p').text("Không được chứ ký tự đặt biệt hoặc khoảng cách");
				break;
			}
		}
	
		// if(pt.test(namekhac)){
		// 	f = false;
		// 	$('#namekhac + p').text("Tên Khoá học không được có dấu và không khoãng cách");
		// }

		if(namekhac.length < 10){
			f = false;
			$('#namekhac + p').text("Tên Khoá học nhiều hơn 10 ký tự");
		}

		//Lấy file ở input
		var files 	= document.getElementById('anhkh').files;
		
		if(f == true){
			jAlert("<img src='../files/loading.gif' />", "red", false);
			$('input, button, div, a, textarea, form').each(function(){
				$(this).blur();
			});

			//Tạo một biến chứa dữ liệu post
			var dataform  = namekh;
				dataform += '/' + namekhac;
				dataform += '/' + time;
				dataform += '/' + idad;
				dataform += '/' + id;

			// Gọi hàm upload file
			doUploadFile(files[0], dataform);
		}

		return false;
	});


});


function doUploadFile(file, dataform){
	//Khởi tạo biến Request
	var http = new XMLHttpRequest();
	http.upload.addEventListener( 'progress', function(event){
		//Lấy tên file
		var fileName = file.name;

		//Lấy dung lượng đã upload
		var fileLoaded = event.loaded;

		//Lấy dung lượng file phải upload
		var fileSize = event.total;

		//Tính tiến trình đã upload, có thể file size bằng 0 nên tính ko dc, nếu tính ko dc thì lấy giá trị là 0;
		var fileProgress = parseInt((fileLoaded / fileSize) * 100) || 0;

	}, false);

	var data = new FormData();

	data.append('dataform', dataform);

	data.append('file', file);

	http.open( 'POST', './../load/suakh.php', false ); 
	//Gứi dữ liệu đi
	http.send(data);
	 console.log(http);
	 console.log(data);
		if (http.readyState == 4 && http.status == 200){

			//Phòng lỗi JSON
			try{
				//Tách kết quả về dạng JSON
				var server = JSON.parse(http.responseText);
				console.log(http.responseText);
				if (server.status == 1){ //Nếu ở file PHP đặt status == 1 để cho biết upload thành công
					//Code upload thành công
					$('.LockBody').remove();
					jAlert(server.message, "green", true);
					$('.all').load('../admin/khoahoc.php');

				}else{//Nếu ở PHP đặt message là cho biết thông báo lỗi gì của người dùng
					//Code thông báo lỗi
					$('.LockBody').remove();
					jAlert(server.message, "red", true);
					// progressBar.style.background = 'red';
				}
			}catch(e){
				//Code lỗi do trình duyệt hoặc lỗi do lập trình
				$('.LockBody').remove();
				jAlert("Có lỗi xãy ra", "red", true);
			}

			//Reset lại form
			document.getElementById('suakh').reset();
		}

		//Bỏ sự kiện upload
		http.removeEventListener( 'progress' );
	//}
}