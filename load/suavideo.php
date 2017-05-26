<?php
	session_start();
	$response = array( 'st' => 0, 'message' => '' );


 if(isset($_SESSION['Id_Users'])){
    include "../function/dbconnect.php";
   
    if(isset($_FILES['file']) && isset($_POST['dataformvideo'])){
    	 $fileError = $_FILES['file']['error'];
    	$fileName = $_FILES['file']['name'];
    	if ($fileError > 0) { //Lỗi vượt dung lượng
	       // $response['status']     = 0;
	        $response['message']    = 'Dung lượng quá giới hạn cho phép';
	    }else { //Không có lỗi nào
	        $upload     = move_uploaded_file($_FILES['file']['tmp_name'], '../files/' . $fileName);
	        if($upload){
	            $tmp    = explode("+", $_POST['dataformvideo']);
	            $sql    = "UPDATE noidung SET
	            			 Name_nd 			= '{$tmp[0]}',
	            			 Name_khong_dau 	= '{$tmp[1]}',
	            			 url 				= '{$tmp[3]}',
	            			 Img_nd 			= '{$fileName}', 
	            			 Time_nd 			= '{$tmp[2]}', 
	            			 Id_Ad 				= '{$tmp[5]}',
	            			 Id_kh 				= '{$tmp[4]}' 
	            			 WHERE Id_nd 		= '{$tmp[6]}'";
	            $reqult = $mysqli -> query($sql);
	            if($reqult){
	            	$response['st']     = 1;
	            	$response['message']    = "Bạn Update Thành Công"; 
	            }else{
	            	$response['message']    = "Bạn Update không Thành Công"; 
	            }
	            
	              

	            
	        }else{
	            //$response['status']     = 0;
	            $response['message']    = "khong update duoc";   
	        }
	    }
    }else if( isset($_POST['dataformvideo'])){
    	 $tmp    = explode("+", $_POST['dataformvideo']);
    	 $sql    = "UPDATE noidung SET
	            			 Name_nd 			= '{$tmp[0]}',
	            			 Name_khong_dau 	= '{$tmp[1]}',
	            			 url 				= '{$tmp[3]}', 
	            			 Time_nd 			= '{$tmp[2]}', 
	            			 Id_Ad 				= '{$tmp[5]}',
	            			 Id_kh 				= '{$tmp[4]}' 
	            			 WHERE Id_nd 		= '{$tmp[6]}'";
        $reqult = $mysqli -> query($sql);
        if($reqult){
        	$response['st']     = 1;
	         $response['message']    = "Bạn Update Thành Công"; 
        }
    }else{
	            //$response['status']     = 0;
	            $response['message']    = "khong update duoc a";   
	        }
    

    
        
        

    echo json_encode($response);
}else{
    echo "Bạn Khong duoc vào";
}
?>


	