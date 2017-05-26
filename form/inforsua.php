<?php
	session_start();

	if(empty($_GET) && count($_POST) == 1 && isset($_SESSION['Id_Users'])){
		include "../function/dbconnect.php";
		$id 		= $_POST['id'];
		$sql 		= "SELECT * FROM admin WHERE Id_Ad = '{$id}' ";
		$reqult 	= $mysqli -> query($sql);
		$arUser 	= mysqli_fetch_assoc($reqult);

	
?>

<div class="titleuser">
	Sửa Thông Tin Cá Nhân 
	<p class="close">X</p>
</div>
<div class="suauser">
	<form action="" method="POST" class="idsuauser" id="<?php echo $arUser['Id_Ad'] ?>" >
		<?php
        		if($arUser['FullName'] != "Admin"){ 
        	?>
        <div class="RowForm">

            <label>FullName</label>
            <div>
                <input type="text" name="fullname" id="fullname" class="form-control" required="required" value="<?php echo $arUser['FullName'] ?>">
                <p></p>
            </div>
        </div>
        <?php }else{
        	?>
        	<label>FullName:</label><?php echo $arUser['FullName'] ?>
        	<input type="hidden" name="fullname" id="fullname" class="form-control" required="required" value="<?php echo $arUser['FullName'] ?>">

        	<?php }?>
        <div class="RowForm">
            <label>Password</label>
            <div>
                <input type="password" name="password" id="password" class="form-control" value="" required="required">
                <p></p>
            </div>
        </div>
        <div class="FootForm">
            <p id="loilg"></p>
            
            <button type="submit">Lưu</button>
        </div>
    
    </form>
</div>
<?php }else{?>
	<div>
		Bạn khong duoc vào
	</div>
<?php }?>