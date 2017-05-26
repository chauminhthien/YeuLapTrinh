<?php   if(!empty($_GET)){ ?>
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
            <div class="baiviet">
                <div class="news">
                    <h2>Video Mới Nhất</h2>
                    
                </div>

                <ul class="item_news">
                    <?php
                        $kh = '';
                        if(isset($_GET['idkh'])){
                             $kh = ' AND `khoahoc`.`Id_kh` = ' . $_GET['idkh'];
                        }
                        $sql        = "SELECT `noidung`.`Name_nd`,
                                             `noidung`.`Id_nd` AS `id`,
                                            `noidung`.`Name_khong_dau` AS `urlkh`,
                                            `Img_nd`,
                                             `khoahoc`.`Name_khong_dau` AS `urlv`
                                               FROM  `noidung`, `khoahoc`
                                            WHERE `noidung`.`Id_kh` = `khoahoc`.`Id_kh` " . $kh ."
                                            ORDER BY `Id_nd` DESC LIMIT 5";
                        $reqult     = $mysqli -> query($sql);
                        while ($ar = mysqli_fetch_assoc($reqult)) { 
  
                    ?>
                    <li>
                        <a href="video.php?type=video&model=do&action=action&idv=<?php echo $ar['id'] ?>&urlkh=<?php echo $ar['urlv'] ?>&urlv=<?php echo $ar['urlkh'] ?>" class="itembv" >
                            <img src="files/<?php echo $ar['Img_nd'] ?>" style=" min-height: 33%; max-width:30%;"/>
                           <?php echo $ar['Name_nd'] ?>
                        </a>
                    </li>
                    <?php }?>

                </ul>
            </div>

            <div class="quangcao">
                <div class="title_quangcao">
                    <h2> Quảng Cáo </h2>
                </div>
                <div class="nd_quangcao">
                    <a href="#">
                        <img src="./files/web.jpg" class="img_qangcao" />
                    </a>
                </div>
            </div> 
<?php }?>