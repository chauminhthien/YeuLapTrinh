<?php 
	session_start();
	if(count($_GET) == 2 && isset($_GET['type'])&& isset($_GET['file']) && $_GET['type'] == 'dangxuat' && ($_GET['file'] == 'home' || $_GET['file'] == 'diendan') ){
		if(isset($_SESSION['User'])){
			unset($_SESSION['User']);
			if($_GET['file'] == 'home'){
				header('location: ../index.php?type=index&model=do&action=action');
			}else if($_GET['file'] == 'diendan'){
				header('location: ../diendan/');
			}
			
		}else{
			header('location: ../diendan/');
		}
	}
?>