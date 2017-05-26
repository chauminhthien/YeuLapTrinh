<?php
    if(!empty($_GET) && count($_GET) == 6 && isset($_GET['type']) && isset($_GET['urlkh'])  && isset($_GET['action']) && isset($_GET['model']) && isset($_GET['idv'])  && isset($_GET['urlv'])  && $_GET['type'] == "video" && $_GET['model'] == "do" && $_GET['action'] == "action" ){
        include ("templates/public/inc/header.php");
        if(isset($_GET['idv'])){
            $idv = $_GET['idv'];
        }
        $sql        = "SELECT Name_nd, Img_nd, Time_nd, admin.FullName AS ad, url, khoahoc.Name_kh AS kh, khoahoc.Name_khong_dau, khoahoc.Id_kh AS idkh FROM `noidung` 
                                            INNER JOIN admin ON admin.Id_Ad = noidung.Id_Ad
                                            INNER JOIN khoahoc ON khoahoc.Id_kh = noidung.Id_kh
                                            WHERE noidung.Id_nd = '$idv' ";
        $reqult     = $mysqli -> query($sql);
        $arvideo    = mysqli_fetch_assoc($reqult);
        $time       = $arvideo['Time_nd'];
?>
    <div class="container bktrang">
        <div class="col-md-8">
            <div class="video">
                <div class="title_video">
                    <h2><?php echo $arvideo['Name_nd'] ?></h2>
                </div>
                <div class="thongtin_video">
                    <p class="col-md-4"><i class="fa fa-user"></i> Đăng Bở:  <?php echo $arvideo['ad'] ?></p>
                    <p class="col-md-4"><i class="fa fa"></i> Úp Ngày: <?php echo date('Y-m-d', $time); ?></p>
                    <div class="clearfix"></div>
                </div>


                <div class="play">
                    <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="<?php echo $arvideo['url'] ?>"></iframe>
                    </div>
                    <h2><?php echo $arvideo['Name_nd'] ?></h2>
                    <p> <span>Khoá Học:</span> <a href="khoa_hoc.php?type=khoa_hoc&model=do&action=action&idkh=<?php echo $arvideo['idkh'] ?>&url=<?php echo $arvideo['Name_khong_dau'] ?> "><?php echo $arvideo['kh'] ?></a></p>
                    <div class="url">
                        <p class="col-md-2">URL:</p>
                        <input type="text" value="<?php echo curPageURL() ?>" class="col-md-10" />
                        <div class="clearfix"></div>
                    </div>

                </div>



                <div class="share ">
                    <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-share-button" data-href="<?php echo curPageURL() ?>" data-layout="button"></div>
                </div>
                <div class="like">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-like" data-href="<?php echo curPageURL() ?>" data-layout="button"></div>
                </div>
                <div class="clearfix"></div>



            </div>
            <div class="cmt">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

                    <div class="fb-comments" data-href="<?php echo curPageURL() ?>" data-width="100%" data-numposts="5"></div>
                </div>    
         <div class="clearfix"></div> 
        </div>


        <div class="col-md-4">
             <div class="fanpage">
                <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-page" data-href="https://www.facebook.com/Y%C3%AAu-L%E1%BA%ADp-Tr%C3%ACnh-494026604102341/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
            </div>
            <div class="video_more">
                <div class="title_video_more">
                    <h2>Video Liên Quang</h2>
                </div>
                <ul class="item_video">
                    <?php 
                        $sqlmore        = "SELECT khoahoc.Name_khong_dau AS khkd, Name_nd, noidung.Name_khong_dau, Img_nd, Id_nd
                                            FROM noidung INNER JOIN khoahoc ON khoahoc.Id_kh = noidung.Id_kh 
                                            WHERE Id_nd != '{$idv}' && noidung.Id_kh = {$arvideo['idkh']} LIMIT 6 ";
                        $requltmore     = $mysqli -> query($sqlmore);
                        while($armore   = mysqli_fetch_assoc($requltmore)){
                    ?>
                    <li>
                        <a href="video.php?type=video&model=do&action=action&idv=<?php echo $armore['Id_nd'] ?>&urlkh=<?php echo $armore['khkd']; ?>&urlv=<?php echo $armore['Name_khong_dau'] ?>" title="">
                            <img src="files/<?php echo $armore['Img_nd'] ?>" class="col-md-4 img-responsive img_video" />
                            <h4 class="col-md-8 des_video_more"><?php echo $armore['Name_nd'] ?></h4>
                        </a>
                        <div class="clearfix"></div>
                    </li>
                    <?php }?>



                    

                </ul>
            </div>
        </div>
    </div>

        
<?php
    include ("templates/public/inc/footer.php");
    }else{
    echo "Bạn truy cập trái phép";
}
?>