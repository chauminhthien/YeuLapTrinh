<?php
	session_start();
	$response = array( 'status' => 0, 'message' => '' );


 if(isset($_SESSION['Id_Users'])){
    include "../function/dbconnect.php";


   
    if(isset($_FILES['file']) && isset($_POST['dataform'])){
    	 $fileError = $_FILES['file']['error'];
    	$fileName = $_FILES['file']['name'];
    	if ($fileError > 0) { //Lỗi vượt dung lượng
	       // $response['status']     = 0;
	        $response['message']    = 'Dung lượng quá giới hạn cho phép';
	    }else { //Không có lỗi nào
	        $upload     = move_uploaded_file($_FILES['file']['tmp_name'], '../files/' . $fileName);
	        if($upload){
	            $tmp    = explode("/", $_POST['dataform']);
	            $sql    = "UPDATE khoahoc SET
	            			 Name_kh = '{$tmp[0]}', Name_khong_dau = '{$tmp[1]}', Img_kh = '{$fileName}', time = '{$tmp[2]}', Id_Ad = '{$tmp[3]}' 
	            			 WHERE Id_kh = '{$tmp[4]}'";
	            $reqult = $mysqli -> query($sql);
	            if($reqult){
	            	$response['status']     = 1;
	            	$response['message']    = "Bạn Update Thành Công"; 
	            }else{
	            	$response['message']    = "Bạn Update không Thành Công"; 
	            }
	            
	              

	            
	        }else{
	            //$response['status']     = 0;
	            $response['message']    = "khong update duoc";   
	        }
	    }
    }else if( isset($_POST['dataform'])){
    	 $tmp    = explode("/", $_POST['dataform']);
    	 $sql    = "UPDATE khoahoc SET
        			 Name_kh = '{$tmp[0]}', Name_khong_dau = '{$tmp[1]}', time = '{$tmp[2]}', Id_Ad = '{$tmp[3]}' 
        			 WHERE Id_kh = '{$tmp[4]}' ";
        $reqult = $mysqli -> query($sql);
        if($reqult){
        	$response['status']     = 1;
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


	