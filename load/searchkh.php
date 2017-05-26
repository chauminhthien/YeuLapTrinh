<?php 
	if(count($_POST) == 1){
		include "../function/dbconnect.php";
		$id = $_POST['id'];
		if($id == 0){
            $sql    = "SELECT Id_nd, Name_nd, Img_nd, Time_nd, admin.FullName AS ad, khoahoc.Name_kh AS kh  FROM noidung
                                    INNER JOIN admin ON noidung.Id_Ad = admin.Id_Ad
                                    INNER JOIN khoahoc ON noidung.Id_kh = khoahoc.Id_kh  ORDER BY Id_nd DESc";
                $reqult         = $mysqli -> query($sql);
            }else{
                $sql    = "SELECT Id_nd, Name_nd, Img_nd, Time_nd, admin.FullName AS ad, khoahoc.Name_kh AS kh  FROM noidung
                                    INNER JOIN admin ON noidung.Id_Ad = admin.Id_Ad
                                    INNER JOIN khoahoc ON noidung.Id_kh = khoahoc.Id_kh  WHERE .khoahoc.Id_kh = '{$id}' ORDER BY Id_nd DESc";
                $reqult         = $mysqli -> query($sql);
            }
            while($arvideo   = mysqli_fetch_assoc($reqult)){
                 $time       = date( "Y-m-d", $arvideo['Time_nd']);

            //      echo "<pre>";
            //      print_r($arvideo);
            //      echo "</pre>";

            ?>

            <tr>
                <td>
                    <?php echo $arvideo['Id_nd']; ?>
                </td>
                <td>
                    <?php echo $arvideo['Name_nd']; ?>
                </td>
                <td>
                    <?php echo $arvideo['kh']; ?>
                </td>
                <td>
                    <img style="width:100px;" src="../files/<?php echo $arvideo['Img_nd']; ?>" alt="<?php echo $arvideo['Name_nd']; ?>" />
                </td>
                <td>
                    <?php echo $time; ?>
                </td>
                <td>
                    <?php echo $arvideo['ad']; ?>
                    
                </td>
                <td>
                    <a href="#" class="sua" data="xemvideo" id="<?php echo $arvideo['Id_nd']; ?>" >Xem</a>
                    <a href="#" class="sua" data="suavideo" id="<?php echo $arvideo['Id_nd']; ?>" >Sửa</a>

                    <a href="#" class="xoa" data="xoavideo" id="<?php echo $arvideo['Id_nd']; ?>">Xoá</a>

                </td>
            </tr> 
  <?php

		}}


?>