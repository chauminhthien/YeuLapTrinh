<?php

	if(count($_POST) == 1){
		include "../function/dbconnect.php";
		$value 	= $_POST['value'];
		 $sqlvideo        = "SELECT Id_nd, Name_nd, noidung.Name_khong_dau, Img_nd, Time_nd, admin.FullName AS ad, khoahoc.Name_khong_dau AS khongdau FROM `noidung` 
                                            INNER JOIN admin ON admin.Id_Ad = noidung.Id_Ad
                                            INNER JOIN khoahoc ON khoahoc.Id_kh = noidung.Id_kh
                                            WHERE noidung.Name_nd LIKE '%{$value}%' ORDER BY `Id_nd` ASC";

                    $requltvideo    = $mysqli -> query($sqlvideo);
                    
	                    while($arvideo  = mysqli_fetch_assoc($requltvideo)){

		                    	echo '<li>
		                                <a href="video.php?type=video&model=do&action=action&idv='.$arvideo['Id_nd'].'&urlkh='.$arvideo['khongdau'].'&urlv='. $arvideo['Name_khong_dau'].'" >
		                                    <img src="files/'. $arvideo['Img_nd'].'" />
		                                    '.$arvideo['Name_nd'].'
		                                </a>
		                            </li>';
		                     
	                    }
	                if(!isset($arvideo['Id_nd'])){
						echo '<li> <a href=""> Không có thông Tin tìm kiếm Thêm</a> </li>';
					}
                	
	}