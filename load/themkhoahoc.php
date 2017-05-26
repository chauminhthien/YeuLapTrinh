<?php
	session_start();
	$response = array( 'status' => 0, 'message' => '' );
    // echo '<pre>';
    // print_r($_POST['data']);
    // echo '</pre>';
/*
<pre>Array
(
    [dataform] => namekh_aaaaaaaaaaaaaaaa-namekhac_aaaaaaaaaaaaaaaaaaaaaaa-time_1448970991-idad_1
   
  
)


</pre><pre>Array
(
    [file] => Array
        (
            [name] => 12071357_414521378749130_1621523472_n.jpg
            [type] => image/jpeg
            [tmp_name] => E:\xamppp\tmp\php5754.tmp
            [error] => 0
            [size] => 55081
        )

)
/
*/
if(isset($_FILES['file'])){
    include "../function/dbconnect.php";
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    
   
        // echo '<pre>';
        // print_r($_FILES);
        // echo '</pre>';
    
    // echo "jjjjjjjjj";
    //$fileName = $_FILES['file']['name'];

    // sao anh qua no chay duoc roi nè anh.

    $fileError = $_FILES['file']['error'];
    $fileName = $_FILES['file']['name'];
    if ($fileError > 0) { //Lỗi vượt dung lượng
       // $response['status']     = 0;
        $response['message']    = 'Dung lượng quá giới hạn cho phép';
    }else { //Không có lỗi nào
        $upload     = move_uploaded_file($_FILES['file']['tmp_name'], '../files/' . $fileName);
        if($upload){
            $tmp    = explode("/", $_POST['dataform']);
            $sql    = "INSERT INTO 
                        khoahoc (Name_kh, Name_khong_dau, Img_kh, time, Id_Ad )
                         VALUES
                          ('{$tmp[0]}', '{$tmp[1]}', '{$fileName}', '{$tmp[2]}','{$tmp[3]}') ";
            $reqult = $mysqli -> query($sql);
            
            $response['status']     = 1;
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


	