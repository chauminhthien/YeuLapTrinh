<?php 
	if(count($_POST) == 2){
		include "../function/dbconnect.php";
		$page 	= $_POST['page'];
		$idkh 	= $_POST['kh'];
		$limit 	= ($page - 1) * 6;
	
        $sqlvideo        = "SELECT Id_nd, Name_nd, noidung.Name_khong_dau, Img_nd, Time_nd, admin.FullName AS ad, khoahoc.Name_khong_dau AS khongdau FROM `noidung` 
                                INNER JOIN admin ON admin.Id_Ad = noidung.Id_Ad
                                INNER JOIN khoahoc ON khoahoc.Id_kh = noidung.Id_kh
                                WHERE noidung.Id_kh = '{$idkh}' ORDER BY `Id_nd` ASC LIMIT $limit,6";
        $requltvideo    = $mysqli -> query($sqlvideo);

        while($arvideo  = mysqli_fetch_assoc($requltvideo)){

                        
        ?>
        <div class="col-md-6 khoa_hoc">
            <div class="khoahoc_view">
                <a href="video.php?type=video&model=do&action=action&idv=<?php echo $arvideo['Id_nd'] ?>&urlkh=<?php echo $arvideo['khongdau']; ?>&urlv=<?php echo $arvideo['Name_khong_dau'] ?>" class="">
                    <img src="files/<?php echo $arvideo['Img_nd']; ?>" class="img-responsive img_view_kh" />
                    <div class="no_view">
                   
                </div>
                <p><?php echo $arvideo['Name_nd']; ?> </p>
                </a>
                <div class="des_khoa_hoc">
                    <p class="dangbo"><i class="fa fa-user" ></i> Đăng bở: <?php echo $arvideo['ad']; ?></p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <?php }}?>
        <div class="clearfix"></div>