<?php
    if(!empty($_GET) && count($_GET) == 5 && isset($_GET['type'])  && isset($_GET['action']) && isset($_GET['model']) && isset($_GET['idkh'])  && isset($_GET['url'])  && $_GET['type'] == "khoa_hoc" && $_GET['model'] == "do" && $_GET['action'] == "action" ){
        include ("templates/public/inc/header.php");
        if(isset($_GET['idkh'])){
            $idkh       = $_GET['idkh'];   
        }
        
        $sql        = "SELECT  khoahoc.Name_kh AS kh FROM `noidung` 
                        
                        INNER JOIN khoahoc ON khoahoc.Id_kh = noidung.Id_kh
                        WHERE noidung.Id_kh = '{$idkh}' ";
                       
        $reqult     = $mysqli -> query($sql);
        $artitle    = mysqli_fetch_assoc($reqult );
?>
    <div class="container bktrang">
        <div class="col-md-8">
            <div class="ds_khoahoc">
                <div class="title_khoahoc">
                    <?php
                        if(count($artitle['kh']) > 0){ 
                    ?>
                    <h2>Video Khoá: <?php echo  $artitle['kh'] ?></h2>
                    <?php }else{
                        echo '<h2>Chưa Có Video Khoá Học</h2>';
                    }?>
                </div>
                <div id="Khoa_Hoc">
                <?php
                    $sqlvideo        = "SELECT Id_nd, Name_nd, noidung.Name_khong_dau, Img_nd, Time_nd, admin.FullName AS ad, khoahoc.Name_khong_dau AS khongdau FROM `noidung` 
                                            INNER JOIN admin ON admin.Id_Ad = noidung.Id_Ad
                                            INNER JOIN khoahoc ON khoahoc.Id_kh = noidung.Id_kh
                                            WHERE noidung.Id_kh = '{$idkh}' ORDER BY `Id_nd` ASC LIMIT 0,6";
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
                <?php }?>
                <!-- cat -->
                 <div class="clearfix"></div>
                </div>
               
            </div>
            <div class="phantrang">
                    <?php
                        $sqldiem        = "SELECT COUNT(`Id_nd`) AS `tong` FROM `noidung` WHERE `Id_kh` = {$idkh}";
                        $requltdiem     = $mysqli -> query($sqldiem);
                        $ardiemso       = mysqli_fetch_assoc($requltdiem);
                        $tong           = $ardiemso['tong'];
                        $page           = ceil($tong / 6);
                    if($page >1){ 
                    ?>
                    <ul class="page" id="pages">
                        <li class="pageinfo">
                            Page <span id="page">1 </span> Of <span id="of"><?php echo $page ?></span>
                        </li>
                        <li class="next" id="prev" page="1" kh="<?php echo $idkh ?>" >
                            <i class="fa fa-angle-double-left" ></i>
                            Prev
                        </li>
                        <li class="next" id="next" page="1" kh="<?php echo $idkh ?>" tong ="<?php echo $page ?>" >
                            Next
                             <i class="fa fa-angle-double-right"></i>
                        </li>
                      
                   </ul>
                   <?php }?>
                <div class="clearfix"></div> 
            </div>      
         <div class="clearfix"></div> 
        </div>
        <div class="col-md-4">
             <?php
                include ("templates/public/inc/right.php");
            ?>
        </div>
    </div>

        
<?php
    include ("templates/public/inc/footer.php");
}else{
    echo "<p>bạn truy cập trái phép </p>";
}
?>