<?php
	ob_start();
	session_start();
	$pageTitle = 'Researches Page';
	$table = "issr_upload_researches";
	$dashboard = "dashboard.php";
	if (isset($_SESSION['username'])) {
		include 'init.php';
			$do = isset($_GET['do']) ? $_GET['do'] : 'All';

			if ($do == 'All') { 			// All Page
				getTable("researches", "all_researches", "Researches List", "Researches List", "", "", "issr_upload_researches.*, issr_subjects.id AS subject_id, issr_subjects.name AS subject_name, issr_users.name AS student_name", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id INNER JOIN issr_users ON issr_upload_researches.student = issr_users.id", "","","issr_upload_researches.id","ASC");

			} elseif ($do == 'All_Researches_Doctors') { 		// All Researches Doctors Page 
				getTable("researches", "all_researches_doctors", "Researches List", "Researches List", "", "", "issr_upload_researches.*, issr_subjects.id AS subject_id, issr_subjects.name AS subject_name, issr_users.name AS student_name", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id INNER JOIN issr_users ON issr_upload_researches.student = issr_users.id", "WHERE issr_upload_researches.doctor = $user_Id","","issr_upload_researches.id","DESC");

			} elseif ($do == 'All_Researches_Students') { 		// All Researches Students Page 
				getTable("researches", "all_researches_students", "Researches List", "Researches List", "", "", "issr_upload_researches.*, issr_subjects.id AS subject_id, issr_subjects.name AS subject_name", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id INNER JOIN issr_users ON issr_upload_researches.student = issr_users.id", "WHERE student = $user_Id","","issr_upload_researches.id","DESC");

			} elseif ($do == 'Upload_Researches') { 		// Upload Researches Page 
				add("subjects", "upload_researches", "Upload Researches", "?do=Done_Upload_Researches");

			} elseif ($do == 'Done_Upload_Researches') { 		// Upload Researches Page 
				insert("subjects", "upload_researches", "$table", "researches.php?do=All_Researches_Students");

			} elseif ($do == 'Approved_Researches') { 		// Approved Researches Page 
				active("done", "$table", "status", "1", "researches.php?do=All_Researches_Doctors");

			} elseif ($do == 'Refused_Researches') { 		// Refused Researches Page 
				active("no", "$table", "status", "2", "researches.php?do=All_Researches_Doctors");

			} elseif ($do == 'Deleted_Researches_Student') { 		// Deleted Researches Student Page 
				delete("issr_upload_researches", "id", "researches.php?do=All_Researches_Students");

			}

		include $tpl .'footer.php'; 
	} else {
		header('Location: index.php');   // Redirect To index Page
		exit();
	}
	ob_end_flush();
?>