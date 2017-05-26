<?php
	session_start();
	$response = array( 'st' => 0, 'message' => '' );

if(isset($_FILES['file'])){
    include "../function/dbconnect.php";

    $fileError = $_FILES['file']['error'];
    $fileName = $_FILES['file']['name'];
    if ($fileError > 0) { //Lỗi vượt dung lượng
       // $response['status']     = 0;
        $response['message']    = 'Dung lượng quá giới hạn cho phép';
    }else { //Không có lỗi nào
        $upload     = move_uploaded_file($_FILES['file']['tmp_name'], '../files/' . $fileName);
        if($upload){
            $tmp    = explode("+", $_POST['dataformvideo']);
            $sql    = "INSERT INTO 
                        noidung (Name_nd, Name_khong_dau,url, Img_nd, Time_nd, Id_Ad, Id_kh )
                         VALUES
                          ('{$tmp[0]}', '{$tmp[1]}','{$tmp[3]}', '{$fileName}', '{$tmp[2]}','{$tmp[5]}', '{$tmp[4]}') ";
            $reqult = $mysqli -> query($sql);
            
            $response['st']     = 1;
            $response['message']    = "Bạn Update Thành Công";   

            
        }else{
            //$response['status']     = 0;
            $response['message']    = "khong update duoc";   
        }
    }
      

    echo json_encode($response);
}else{
    echo "Bạn Khong duoc vào";
}
?>


	