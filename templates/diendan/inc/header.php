<!DOCTYPE html>
<?php 
	session_start();

	if(!$_SESSION['User']){
		header("location: login.php?file=diendan");
		exit();
	}
	include './../function/dbconnect.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Diễn Đàn: . : Yêu Lập Trình : .</title>
		<link rel="shortcut icon" href="../templates/public/img/favicon.ico" >
		<link href="../templates/diendan/css/style.css" rel="stylesheet" type="text/css" />
		<link href="../templates/diendan/css/jAlert.css" rel="stylesheet" type="text/css" />
		<link href="../templates/diendan/css/bootstrap.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<header>
		<div class="backtop">
        </div>
		<div class="col-md-8">
			<a href="../diendan/"><h1>Yêu Lập Trình </h1></a> 
			<p>Nơi Chia Sẽ Những Bài Học Hay </p>
		</div>
		<div class="col-md-4">
			<a class="dx"  href="logout.php?type=dangxuat&file=diendan">Đăng Xuất</a>
		</div>
		<div class="clear"></div>
		<div class="menu">
			<form method="post" class="form_seach col-md-5">
				<input type="text" class="form-control" placeholder="Enter KeyWord...." />
				<span class="glyphicon glyphicon-search"></span>
			</form>
		<div class="clear"></div>	
		</div>
	</header>