<?php
    session_start();
    if(isset($_SESSION['Id_Users'])){ 
?>

            <div class="col-md-2">
                    <a href="#" class="home" data="themvideo" style="float: right;">
                        <img src="../templates/admin/images/Crystal_Clear_write.gif" width="64" height="64" alt="edit">
                        <span>Thêm Video</span>
                    </a>
                </div>
                 <div class="col-md-2">
                    <a href="#" class="home" data="them" them="themkhoahoc">
                        <img src="../templates/admin/images/Crystal_Clear_files.gif" width="64" height="64" alt="edit">
                        <span>Thêm Khoá Học</span>
                    </a>
                </div>
                 <div class="col-md-8">
                    <div class="thongtin">
                        <div class="title">
                            <h2>Quảng Trị Hệ Thống</h2>
                        </div>
                        <p>
                            <span>
                                Trang Chủ Admin:
                            </span>
                            Yêu Lập Trình:. Nơi Chia sẽ những bài học hay
                        </p>
                         <p>
                            <span>
                                Quản Trị viên:
                            </span>
                            Nhóm 14 ĐHCNTT-1
                        </p>
                         <p>
                            <span>
                                Email:
                            </span>
                            yeulaptrinh@gmail.com
                        </p>
                         <p>
                            <span>
                                Phone:
                            </span>
                            0963.501.008
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
<?php }else{
    echo "bạn khong duoc vào";
}