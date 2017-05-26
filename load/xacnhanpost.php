<?php
	session_start();
	$response = array( 'st' => 0, 'message' => '' );


 if(isset($_SESSION['Id_Users']) && count($_POST) == 1){
    include "../function/dbconnect.php";  
    $id 		= $_POST['id'];

    $sql 		= "UPDATE post SET st = 1 WHERE Id_post = '{$id}' ";
    $reqult 	= $mysqli -> query($sql);
    if($reqult){
    	$response['st'] = 1;
    }
        

    echo json_encode($response);
}else{
    echo "Bạn Khong duoc vào";
}
?>


	