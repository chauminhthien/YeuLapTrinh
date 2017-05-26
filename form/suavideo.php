<?php
    session_start();
    if(isset($_SESSION['Id_Users']) && count($_POST) == 1){ 
        include "../function/dbconnect.php";
        $sql 			= "SELECT * FROM noidung WHERE Id_nd = '{$_POST['id']}' ";
        $reqult 		= $mysqli -> query($sql);
        $arsuavideo 	= mysqli_fetch_assoc($reqult);
?>


<div class="themuser">
	<div class="title_themuser">
		<h2>Sửa Video</h2>
	</div>

	<div class="them_user">
 
		<form action="" method="post" class="suavideo" id="suavideo" data-id="<?php echo $arsuavideo['Id_nd'] ?>" enctype="multipart/form-data" >
            <div class="RowForm">

                <label>Tên Video</label>
                <div>
                    <input type="text" name="namevideo" id="namevideo" class="form-control" required="required" value="<?php echo $arsuavideo['Name_nd'] ?>">
                    <p></p>
                </div>
            </div>

            <div class="RowForm">

                <label>Tên Video không Dấu</label>
                <div>
                    <input type="text" name="namekhac" id="namekhac" class="form-control" required="required" value="<?php echo $arsuavideo['Name_khong_dau'] ?>">
                    <p></p>
                </div>
            </div>

            <div class="RowForm">

                <label>URL</label>
                <div>
                    <input type="text" name="url" id="url" class="form-control" required="required" value="<?php echo $arsuavideo['url'] ?>">
                    <p></p>
                </div>
            </div>
            <div class="RowForm">

                <label>Tên Khoá Học</label>
                <div>
                    <select name="khoahoc" id="khoahoc" class="form-control">
                        
                        <?php
                            $sql            = "SELECT * FROM khoahoc";
                            $reqult         = $mysqli -> query($sql);
                            while ($arkh    = mysqli_fetch_assoc($reqult)){
                            	if($arsuavideo['Id_kh'] == $arkh['Id_kh']){
                                    $select = 'select="select"';
                                }else{
                                    $select =null;
                                }
                        ?>
                            <option <?php echo $select; ?> value="<?php echo $arkh['Id_kh']; ?>"><?php echo $arkh['Name_kh']; ?></option>
                            <?php }?>
                        </select>
                    <p></p>
                </div>
            </div>

            <div class="RowForm">

                <label>Ảnh Khoá Học</label>
                <div>
                	<img style="width:100px" src="../files/<?php echo $arsuavideo['Img_nd'] ?>">
                    <input type="file" name="anhvideo" id="anhvideo" class="form-control" accept="image/x-png, image/png, image/gif, image/jpeg" value="">
                    <p></p>
                </div>
            </div>
            <div class="FootForm">
                <input type="hidden" name="time" id="time" class="form-control" value="<?php echo time(); ?>" required="required">
                <input type="hidden" name="idad" id="idad" class="form-control" value="<?php echo $_SESSION['Id_Users']; ?>" required="required">
                <p id="loilg"></p>
            
                <button type="submit">Sửa Video</button>
            </div>
        </form>
        <div class="process" id="progress">
            <div class="progressChild">
                <!-- <div class="progressBar">Đang tải lên</div>
                <div class="progressText">80%</div> -->
            </div>
        </div>
	</div>
    <script src="../templates/admin/js/suavideo.js"></script>
</div>
<?php }else{
    echo "ban khong duoc vao";
    //Toanf chomo  code xuar anh laf sao
    // em chom ý tuong. chom code html. tai em lam bien viet quá, hihi
    // cai bốtrap nay thieu "-" a anh.
}
?>