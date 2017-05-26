<?php 
	include './../../function/dbconnect.php';
  $sqlTV      = "SELECT COUNT(`user`.`Id_User`) AS thanhvien FROM `user` ";
  $sqlCMT     = "SELECT  COUNT(`cmt`.`Id_cmt`) AS cmt  FROM  `cmt` ";
  $sqlHoi     = "SELECT COUNT(`post`.`Id_post`) AS cauhoi  FROM `post` ";

  $requltTV     = $mysqli -> query($sqlTV);
  $requltCMT  = $mysqli -> query($sqlCMT);
  $requltHoi  = $mysqli -> query($sqlHoi);
  if($requltTV){
    $arTV       = mysqli_fetch_assoc($requltTV);
  }
  if($requltHoi){
   $arHoi      = mysqli_fetch_assoc($requltHoi);
  }
  if($requltCMT){
   $arCMT      = mysqli_fetch_assoc($requltCMT);
  }
   
?>


				<p id="cauhoi"><?php echo $arHoi['cauhoi']; ?> <span>Câu hỏi</span></p>
				<p><?php echo $arTV['thanhvien']; ?> <span>Thành viên</span></p>
				<p id="binhluan"><?php echo $arCMT['cmt']; ?> <span>Bình luận</span></p>
			