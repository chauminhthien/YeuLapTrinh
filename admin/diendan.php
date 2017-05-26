<?php
  session_start();
  if(isset($_SESSION['Id_Users'])){
    include "../function/dbconnect.php";
?>
<?php
  echo (isset($_GET['type']) && $_GET['type'] == "canxacnhan") ? '<a href="" class="them" data-menu="diendan" data="menu">Tất Cả Bài Viết</a>' : '<a href="" class="them" data="canxn">Bài Cần Xác Nhận</a>';
?>

<div class="userad">

  <table class="table table-condensed" style="margin-top: 20px;" >
      <thead>
        <th>
          ID
        </th>
        <th style="width: 40%;">
          Nội Dung
        </th>
        <th>
          Ảnh
        </th>
        <th style="width: 15%;">
          Trạng Thái
        </th>
        <th>
          Thời Gian
        </th>
        <th>
          Người Post
        </th>
        <th>
          Chức Năng
        </th>
      </thead>
      <tbody>
        <?php
          if(isset($_GET['type']) && $_GET['type'] == "canxacnhan"){
            $sql      = "SELECT Id_post, Nd_post, Img_post, st, Time_post, post.Id_User AS Id_User, user.FullName AS FullName FROM post INNER JOIN `user` ON post.Id_User = `user`.Id_User WHERE st = 0";
            $reqult     = $mysqli -> query($sql);
          }else{
            $sql      = "SELECT Id_post, Nd_post, Img_post, st, Time_post, post.Id_User AS Id_User, user.FullName AS FullName FROM post INNER JOIN `user` ON post.Id_User = `user`.Id_User";
            $reqult     = $mysqli -> query($sql);
          }
          
          while($arpost   = mysqli_fetch_assoc($reqult)){

            $time     = date('Y-m-d', $arpost['Time_post']);
            $trangthai  = ($arpost['st'] == 1) ? 'Đã Xác Nhận' : 'Chưa Xác Nhận <br/> <a href="" data="xacnhan" id="'. $arpost['Id_post'] . '" >Xác Nhận</a> ';
        ?>
        <tr>
          <td>
            <?php echo $arpost['Id_post']; ?>
          </td>
          <td>

            <?php echo substr($arpost['Nd_post'], 0, 30); ?>
          </td>
          <td>
            <?php
              if($arpost['Img_post'] == ""){
                echo "không có ảnh";
               }else{ 
            ?>
            <img src="../files/<?php echo $arpost['Img_post']; ?>" class="img_post">
            <?php }?>
            
          </td>
          <td>
            <?php echo $trangthai ; ?>
          </td>
          <td>
            <?php echo $time; ?>
          </td>
          <td>
            <a href="" class="" data="xemtk"  id="<?php  echo $arpost['Id_User']; ?>" ><?php echo $arpost['FullName']; ?></a>
          </td>
          <td>
            <a href="" class="sua" data="suapost"  id="<?php  echo $arpost['Id_post']; ?>" >Xem</a>

            <a href="" class="xoa" data="xoapost"  id="<?php echo $arpost['Id_post']; ?>">Xoá</a>

          </td>
        </tr>
        <?php }?>
      </tbody>  
  </table>
</div>
<?php }else{
  echo "ban khong duoc vào";
}
?>