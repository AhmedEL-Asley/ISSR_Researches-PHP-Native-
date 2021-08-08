<?php
ob_start(); // Output Buffering Start
	session_start();
	if (isset($_SESSION['username'])) {
		$pageTitle = 'Home Page' ;
		include 'init.php';
		getHeader("Home Page");

		if ($user['department_type'] == 0) {
			dashboard("Administrator");
		} elseif ($user['department_type'] == 1) {
			dashboard("Doctor");
		} elseif ($user['department_type'] == 2) {
			dashboard("Student");
		}
		
		include $tpl .'footer.php'; 
	} else {
		header('Location: index.php');   // Redirect To index Page
		exit();
	}
ob_end_flush();
?>

