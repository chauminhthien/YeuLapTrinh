<?php ob_start(); ?>

<?php session_start(); 
	//include_once "../function/chek.php";
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
        <div class="login">
            <div class="title">
                <h2>LOGIN SYSTEM</h2>
            </div>
            <form action="" method="POST" class="form_login">

                <div class="RowForm">
                    <label>Email</label>
                    <div>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Please enter Email " required="required">
                        <p></p>
                    </div>
                </div>
                <div class="RowForm">
                    <label>Password</label>
                    <div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Please enter password" required="required">
                        <p></p>
                    </div>
                </div>
                <div class="FootForm">
                    <p id="loilg"></p>
                    <button type="submit">Login</button>
                    
                </div>
            
            </form>
        </div>
    </body>
</html>
<?php ob_end_flush(); ?>