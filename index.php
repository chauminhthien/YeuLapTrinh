<?php
     if(!empty($_GET) && count($_GET) == 3 && isset($_GET['type'])  && isset($_GET['action']) && isset($_GET['model']) && $_GET['type'] == "index" && $_GET['model'] == "do" && $_GET['action'] == "action" ){
    include ("templates/public/inc/header.php");  
         include "function/dbconnect.php";
        $sql        = "SELECT * FROM khoahoc";
        $reqult     = $mysqli -> query($sql);
        $sql        = "SELECT * FROM khoahoc";
        $reqult     = $mysqli -> query($sql);

?>
    <div class="container bktrang">
        <div class="col-md-8">
            <div class="title_kh">
                <h2>Danh Mục Khoá Học</h2>
            </div>
            
            <?php
                while($arkhoahoc = mysqli_fetch_assoc($reqult)){
            ?>
            <div class="col-md-6 view">
                <a href="#" class="link_kh">
                    <img src="files/<?php echo $arkhoahoc['Img_kh'] ?>" class="img-responsive" />
                </a>
                <p class="des_kh"><?php echo $arkhoahoc['Name_kh'] ?> </p>
                
                <div class="noview">
                    <a href="khoa_hoc.php?type=khoa_hoc&model=do&action=action&idkh=<?php echo $arkhoahoc['Id_kh'] ?>&url=<?php echo $arkhoahoc['Name_khong_dau'] ?> "><i class="icon fmm-resolution"></i> Chi Tiết</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <?php }?>
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
    echo "Bạn truy cập trái phép";
}
?>