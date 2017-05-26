<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    
        <link rel="stylesheet" href="../templates/diendan/css/login.css">
        <link rel="stylesheet" href="../templates/diendan/css/jAlert.css">
        <link rel="shortcut icon" href="../templates/public/img/favicon.ico" >

    
    
    
  </head>

  <body>

    <div class="vid-container">
  <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop>
      <source src="../templates/diendan/files/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
  </video>
  <div class="inner-container">
    <video id="Video2" class="bgvid inner" autoplay="false" muted="muted" preload="auto" loop>
      <source src="../templates/diendan/files/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
    </video>
    <div class="box">
      <h1>Login</h1>
      <p id="loilogin" style="color: red; font-size:15px"></p>
      <?php 
        if(isset($_GET['file'])){
          $file = $_GET['file'];
        }
      ?>
      <form method="post" action="" id="login" file="<?php echo $file ?>">
        <input type="text" placeholder="Email"/ id="email">
        <input type="password" placeholder="Password" id="pass" />
        <button type="submit">Login</button>
      </form>
      <a style="text-decoration: none;color: red;margin-left: 40%;" href="../dang_ky.php?type=dangky&model=do&action=action">Đăng Ký</a>
     
    </div>
  </div>
</div>
    <script src='../templates/diendan/js/jquery.js'></script>

        <script src="../templates/diendan/js/login.js"></script>
        <script src='../templates/diendan/js/jAlert.js'></script>
  <script src="../templates/diendan/js/js.js"></script>
    
    
    
  </body>
</html>
