<?php
    session_start();
    if(isset($_SESSION['Id_Users']) && count($_POST) == 1){
    	include "../function/dbconnect.php";
    	$id 			= $_POST['id'];
    	$sql 			= "SELECT Id_kh, Name_kh, Name_khong_dau, Img_kh, admin.Id_Ad 
    						AS admin FROM khoahoc INNER JOIN admin 
    							ON khoahoc.Id_Ad = admin.Id_Ad WHERE Id_kh = '{$id}' ";
    	$reqult 		= $mysqli -> query($sql);
    	$arkh 			= mysqli_fetch_assoc($reqult);
?>


<div class="themuser">
	<div class="title_themuser">
		<h2>Sửa Khoá Học</h2>
	</div>

	<div class="them_user">
 
		<form action="" method="post" class="suakh" id="suakh" data-id="<?php echo $arkh['Id_kh']; ?>" enctype="multipart/form-data" >
            <div class="RowForm">

                <label>Tên Khoá Học</label>
                <div>
                    <input type="text" name="namekh" id="namekh" class="form-control" required="required" value="<?php echo $arkh['Name_kh']; ?>">
                    <p></p>
                </div>
            </div>

            <div class="RowForm">

                <label>Tên Không Dấu (cách nhau bằng - )</label>
                <div>
                    <input type="text" name="namekhac" id="namekhac" class="form-control" required="required" value="<?php echo $arkh['Name_khong_dau']; ?>">
                    <p></p>
                </div>
            </div>

            <div class="RowForm">

                <label>Ảnh Khoá Học</label>
                <div>
                	<img src="../files/<?php echo $arkh['Img_kh']; ?>" class="img_kh" />
                    <input type="file" name="anhkh" id="anhkh" class="form-control" accept="image/x-png, image/png, image/gif, image/jpeg">
                    <p></p>
                </div>
            </div>
            <div class="FootForm">
                <input type="hidden" name="time" id="time" class="form-control" value="<?php echo time(); ?>" required="required">
                <input type="hidden" name="idad" id="idad" class="form-control" value="<?php echo $_SESSION['Id_Users']; ?>" required="required">
                <p id="loilg"></p>
            
                <button type="submit">Sửa</button>
            </div>
        </form>
        <div class="process" id="progress">
            <div class="progressChild">
                <!-- <div class="progressBar">Đang tải lên</div>
                <div class="progressText">80%</div> -->
            </div>
        </div>
	</div>
	<script src="../templates/admin/js/suakh.js"></script>
</div>
<?php }else{
    echo "ban khong duoc vao";

}
?>