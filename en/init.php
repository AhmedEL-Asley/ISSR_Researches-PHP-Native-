<?php

include '../config/connect.php';

// Routes
$tpl 	= 'includes/templates/' ; // Template Directory
$func 	= 'includes/functions/' ; // Function Directory
$css  	= 'layout/css/' ; // Css Directory
$js 	= 'layout/js/' ; // Js Directory
$img 	= 'layout/img/' ; // Images Directory

// Include The Important Files
include $func 	.'basics.php'; 
include $func 	.'all.php'; 
include $func 	.'add.php'; 
include $func 	.'insert.php'; 
include $func 	.'edit.php'; 
include $func 	.'update.php'; 
include $tpl 	.'header.php'; 

// Include Navbar On All Pages Expecet The One With $noNavbar Vairable    
    if (!isset($noNavbar)) { include $tpl 	.'navbar.php'; }
