<?php
    if(!empty($_GET)){ 
    session_start();
?>

<?php ob_start(); ?>

<?php
					function curPageURL() {
					$pageURL = "http";
					if (isset($_SERVER['HTTPS'])) {
					$pageURL .= "s";
					}
					$pageURL .= "://";
					if ($_SERVER["SERVER_PORT"] != "80") {
					$pageURL .= $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
					} else {
					$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
					}
					return $pageURL;
					}
					//echo "Đây là URL hiện tại của bạn: ". curPageURL();
				?>
<?php
    include_once("function/dbconnect.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>.: Yêu Lập Trình :. Nơi chia sẽ bài học hay về lập trình</title>
        <link rel="shortcut icon" href="templates/public/img/favicon.ico" >
        <link rel="stylesheet" type="text/css" href="templates/public/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="templates/public/css/style.css">
         <link rel="stylesheet" type="text/css" href="templates/public/css/jAlert.css">
        <link rel="stylesheet" type="text/css" href="templates/public/font-awesome/css/font-awesome.css">
        
        
        <script src="templates/public/js/JavaScrip.js"></script>
        <script src="libraries/ckediter/ckeditor.js"></script>
        
        <script src="templates/public/js/js.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7">
        </script>
        <script src="templates/public/js/maplace-0.1.3.js"></script>
        <script src="templates/public/js/jquery.js"></script>
        <script src="libraries/jquery/dist/jquery.validate.js"></script>
        <script src="templates/public/js/bootstrap.js"></script>
    </head>
    <body>

        <!-- <video autoplay="" loop="" id="bgvid" class="hidden-sm hidden-xs">
                <source src="files/saigon.mp4" type="video/mp4">
        </video> -->
        <head>
        <div class="backtop">
        </div>
            <div id="menu">
                <!-- menu -->
                <nav class="navbar navbar-default menu">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="" id="">
                            <ul class="nav navbar-nav">
                                <?php 
                                    if(!isset($_SESSION['User'])){ 

                                       
                                ?>
                                <li class="icon"><a href="./diendan/login.php?file=home" class="mautrang dn"><i class="fa fa-sign-in "></i>&nbsp;Đăng Nhập</a></li>
                                <li class="icon"><a href="dang_ky.php?type=dangky&model=do&action=action" class="mautrang dn">&nbsp;Đăng Ký</a></li>
                                <?php }else{  ?>
                                <li class="icon user">
                                	<img src="files/<?php echo $_SESSION['User']['Img_user']  ?>">
                                	<a href="diendan/infouser.php?id=<?php echo $_SESSION['User']['Id_User']  ?>" class="mautrang ">
                                	
                                	<?php echo $_SESSION['User']['FullName']  ?>
                                </a>
                                </li>
                                <li class="icon"><a href="./diendan/logout.php?type=dangxuat&file=home" class="mautrang dn"><i class="fa fa-sign-in "></i>&nbsp;Đăng Xuất</a></li>
                                <?php }?>
                                
                            </ul>
                            
                            <ul class="nav navbar-nav navbar-right hidden-md hidden-xs hidden-sm">
                                <li class="tk">
                                    <form class="navbar-form form" role="search" id="timkiem-form" method="post">
                                        <div class="form-group timkiem">
                                            <input type="text" class="form-control search" placeholder="Search.....">
                                        </div>
                                        <button type="submit" class="btn btn-default icon_tk sss"><span class="fa fa-search"></span></button>
                                    </form>
                                    <div class="ketqua">
                                        <ul>
                                            
                                        </ul>
                                    </div>
                                </li>
                                <li class="icon"><a href="https://www.facebook.com/d.shop.2015" class="icon_menu"><i class="fa fa-facebook fa-fw"></i></a></li>
                                <li class="icon"><a href="#" class="icon_menu"><i class="fa fa-google-plus fa-fw"></i></a></li>
                                <li class="icon"><a href="#" class="icon_menu"><i class="fa fa-twitter fa-fw"></i></a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
               <!--  end menu -->
               <!-- menu 9 -->
               <nav id="scroll" class="navbar navbar-default menu9">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand logomenu" href="index.php?type=index&model=do&action=action"><img src="templates/public/img/logo.png" class="img-responsive logo_menu" /></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse collapse.in" id="bs-example-navbar-collapse-1">
                           
                            <ul class="nav navbar-nav navbar-right menu_9">
                                <li class="activemenu"><a href="index.php?type=index&model=do&action=action">Trang Chủ</a></li>

                                <li>
                                    <a  href="./diendan/" target="_blank">Diễn Đàn</a>
                                </li>
                                
                                <li class="dropdown show_menu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Khoá Học <span class="caret"></span></a>
                                  <ul class="dropdown-menu sanpham">
                                    <?php 
                                        include "function/dbconnect.php";
                                        $sql        = "SELECT * FROM khoahoc";
                                        $reqult     = $mysqli -> query($sql);
                                        while($arkhoahoc = mysqli_fetch_assoc($reqult)){
                                    ?>
                                    <li>
                                        <a href="khoa_hoc.php?type=khoa_hoc&model=do&action=action&idkh=<?php echo $arkhoahoc['Id_kh'] ?>&url=<?php echo $arkhoahoc['Name_khong_dau'] ?> "><i class="fa fa-angle-right"></i>&nbsp;&nbsp;<?php echo $arkhoahoc['Name_kh'] ?></a>
                                    </li>
                                    <?php }?>
                                    
                                  </ul>
                                </li>
                                <li><a href="" class="chuaupdate">Thủ Thuật lập trình</a></li>
                                <li><a href="" class="chuaupdate">Tài liệu Hay</a></li>
                                <li><a href="lien_he.php?type=lienhe&model=do&action=action">Liện Hệ</a></li>
                                
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
                <div class="col-md-10">
                    
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </head>

        <?php }?>