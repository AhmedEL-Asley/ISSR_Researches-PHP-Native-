<?php
	$host 	= "localhost";
	$db		= "issr_researches";
	$user 	= "root";
	$pass 	= "";
	$dsn 	= "mysql:host=$host;dbname=$db";

	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		);
	try {
		$con = new PDO($dsn, $user, $pass, $option);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "<h1 class='alert alert-danger text-center'>" . "Faild To Connect To DataBase ........." . $e->getMessage() . "</h1>";
	}
