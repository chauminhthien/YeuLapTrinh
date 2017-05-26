<?php ob_start(); ?>

<?php session_start(); 
    include_once "../function/chek.php";
?>


<?php 
    

    if(isset($_SESSION['Id_Users'])){
        $Id_Users = $_SESSION['Id_Users'];
        //echo $fullname;
    }
    $FullName="";
    if(isset($_SESSION['FullName'])){
        $FullName = $_SESSION['FullName'];
        //echo $fullname;
    }
 
?>


<?php 
    //include_once "../function/dbconnect.php";
    //include_once "../function/define.php";
?>
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <title>.: Yêu Lập Trình :. Admin template</title>
            <link rel="shortcut icon" href="../templates/public/img/favicon.ico" >

            <link rel="stylesheet" type="text/css" href="../templates/public/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../templates/public/font-awesome/css/font-awesome.css" >
            <link rel="stylesheet" type="text/css" href="../templates/admin/css/jAlert.css" >
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

            <script src="../libraries/ckediter/ckeditor.js"></script>
            <link rel="stylesheet" type="text/css"
              href="../templates/admin/css/style.css" media="screen" />

            <script src="../templates/admin/js/jAlert.js"></script>
              <script src="../templates/admin/js/jquery.js"></script>
            <script src="../templates/admin/js/admin.js"></script>
            <script src="../templates/admin/js/js.js"></script>
            

    </head>
    <body>
         <header>
              <div class="menu_small">
                <div class="col-md-4">
                    <img src="../templates/admin/images/logo.png" class="img-responsive img_logo" />
                </div>
                <div class="col-md-5 user">
                    <h4>
                    WellCome: <a href="#" id="<?php echo $Id_Users; ?>" data=user > <?php echo $FullName; ?></a>
                </h4>
                <h4>
                     <a href="logout.php"> Đăng Xuất</a>
                </h4>
                <div class="clearfix"></div>
                </div>
                 <div class="clearfix"></div>
            </div>  
        </header>
