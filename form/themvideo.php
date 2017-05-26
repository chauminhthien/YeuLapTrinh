<?php
    session_start();
    if(isset($_SESSION['Id_Users'])){ 
        include "../function/dbconnect.php";
?>


<div class="themuser">
	<div class="title_themuser">
		<h2>Thêm Video</h2>
	</div>

	<div class="them_user">
 
		<form action="" method="post" class="themvideo" id="addvideo" enctype="multipart/form-data" >
            <div class="RowForm">

                <label>Tên Video</label>
                <div>
                    <input type="text" name="namevideo" id="namevideo" class="form-control" required="required" value="">
                    <p></p>
                </div>
            </div>

            <div class="RowForm">

                <label>Tên Video không Dấu</label>
                <div>
                    <input type="text" name="namekhac" id="namekhac" class="form-control" required="required" value="">
                    <p></p>
                </div>
            </div>

            <div class="RowForm">

                <label>URL</label>
                <div>
                    <input type="text" name="url" id="url" class="form-control" required="required" value="">
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
                        ?>
                            <option value="<?php echo $arkh['Id_kh']; ?>"><?php echo $arkh['Name_kh']; ?></option>
                            <?php }?>
                        </select>
                    <p></p>
                </div>
            </div>

            <div class="RowForm">

                <label>Ảnh Khoá Học</label>
                <div>
                    <input type="file" name="anhvideo" id="anhvideo" class="form-control" accept="image/x-png, image/png, image/gif, image/jpeg" required="required" value="">
                    <p></p>
                </div>
            </div>
            <div class="FootForm">
                <input type="hidden" name="time" id="time" class="form-control" value="<?php echo time(); ?>" required="required">
                <input type="hidden" name="idad" id="idad" class="form-control" value="<?php echo $_SESSION['Id_Users']; ?>" required="required">
                <p id="loilg"></p>
            
                <button type="submit">Thêm Video</button>
            </div>
        </form>
        <div class="process" id="progress">
            <div class="progressChild">
                <!-- <div class="progressBar">Đang tải lên</div>
                <div class="progressText">80%</div> -->
            </div>
        </div>
	</div>
    <script src="../templates/admin/js/themvideo.js"></script>
</div>
<?php }else{
    echo "ban khong duoc vao";
    //Toanf chomo  code xuar anh laf sao
    // em chom ý tuong. chom code html. tai em lam bien viet quá, hihi
    // cai bốtrap nay thieu "-" a anh.
}
?>