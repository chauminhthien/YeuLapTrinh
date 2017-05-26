<?php
    session_start();
    if(isset($_SESSION['Id_Users'])){ 
?>


<div class="themuser">
	<div class="title_themuser">
		<h2>From Thông Tin</h2>
	</div>

	<div class="them_user">
		<form action="" method="POST" class="adduser" >
        <div class="RowForm">

            <label>FullName</label>
            <div>
                <input type="text" name="fullname" id="fullname" class="form-control" required="required" value="">
                <p></p>
            </div>
        </div>

        <div class="RowForm">

            <label>Email</label>
            <div>
                <input type="email" name="email" id="email" class="form-control" required="required" value="">
                <p></p>
            </div>
        </div>

        <div class="RowForm">
            <label>Password</label>
            <div>
                <input type="password" name="password" id="password" class="form-control" value="" required="required">
                <p></p>
            </div>
        </div>
        <div class="FootForm">
            <p id="loilg"></p>
            
            <button type="submit">Thêm User</button>
        </div>
    
    </form>
	</div>

</div>
<?php }else{
    echo "ban khong duoc vao";
}
?>