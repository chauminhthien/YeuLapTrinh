<?php 
	$mysqli = new MySQLi("localhost", "root", "", "YeuLapTrinh");
	//$mysqli = new MySQLi("sql110.byethost7.com", "b7_17013646", "chauminhthien", "b7_17013646_yeulaptrinh");
	// tieng việt
	$mysqli -> set_charset('utf8');
	//thong bao khi có loi
	if(mysqli_connect_errno()){
		echo ("có lỗi trong quá trình kết nối dữ liệu" . mysqli_connect_error());
		exit();
	}
?>