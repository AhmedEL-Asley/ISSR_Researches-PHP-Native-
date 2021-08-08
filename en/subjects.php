<?php
	ob_start();
	session_start();
	$pageTitle = 'Courses Page';
	$table = "issr_subjects";
	$dashboard = "dashboard.php";
	if (isset($_SESSION['username'])) {
		include 'init.php';
			$do = isset($_GET['do']) ? $_GET['do'] : 'All';

			if ($do == 'All') { 			// All Courses Page
				getTable("subjects", "all_subjects", "Courses Page", "Courses Page", "", "", "issr_subjects.*, issr_departments.name AS department_name", "issr_subjects", "INNER JOIN issr_departments ON issr_subjects.department = issr_departments.id", "","","issr_subjects.id","ASC");

			} elseif ($do == 'All_Subject_Doctor') { 		// All Courses Doctor Page
				getTable("subjects", "all_subjects_doctors", "Courses Doctor Page", "Courses Doctor Page", "", "", "issr_subjects.*, issr_departments.name AS department_name, issr_subjects_doctors_registration.id AS subjects_registration_id", "issr_subjects", "INNER JOIN issr_departments ON issr_subjects.department = issr_departments.id INNER JOIN issr_subjects_doctors_registration ON issr_subjects.id = issr_subjects_doctors_registration.subject", "WHERE  issr_subjects_doctors_registration.doctor = $user_Id ","","issr_subjects.id","ASC");

			} elseif ($do == 'All_Subject_Student') { 		// All Courses Student Page
				getTable("subjects", "all_subjects_students", "Courses Student Page", "Courses Student Page", "", "", "issr_subjects.*, issr_departments.name AS department_name, issr_subjects_students_registration.id AS subjects_registration_id", "issr_subjects", "INNER JOIN issr_departments ON issr_subjects.department = issr_departments.id INNER JOIN issr_subjects_students_registration ON issr_subjects.id = issr_subjects_students_registration.subject", "WHERE  issr_subjects_students_registration.student = $user_Id ","","issr_subjects.id","ASC");

			} elseif ($do == 'Add_Subject') { 		// Add Course Page 
				add("subjects", "add_subject", "Add New Course", "?do=Insert_Subject");

			} elseif ($do == 'Insert_Subject') { 		// Insert Course Page 
				insert("subjects", "insert_subject", "$table", "subjects.php");

			} elseif ($do == 'Add_Subject_Doctor') { 		// Add Course Doctor Page 
				add("subjects", "add_subject_doctor", "Course Registration", "?do=Insert_Subject_Doctor");

			} elseif ($do == 'Insert_Subject_Doctor') { 		// Insert Course Doctor Page 
				insert("subjects", "insert_subject_doctor", "issr_subjects_doctors_registration", "subjects.php?do=All_Subject_Doctor");

			} elseif ($do == 'Add_Subject_Student') { 		// Add Course Student Page 
				add("subjects", "add_subject_student", "Course Registration", "?do=Insert_Subject_Student");

			} elseif ($do == 'Insert_Subject_Student') { 		// Insert Course StudentPage 
				insert("subjects", "insert_subject_student", "issr_subjects_students_registration", "subjects.php?do=All_Subject_Student");

			} elseif ($do == 'Edit_Subject') { 		// Edit Course Page 
				edit("subjects", "edit_subject", "Edit Course", "?do=Update_Subject", "$table");

			} elseif ($do == 'Update_Subject') { 		// Update Course Page 
				update("subjects", "update_subject", "$table", "subjects.php");

			} elseif ($do == 'Deleted_Subject') { 		// Deleted Course Page 
				delete("$table", "id", "subjects.php");

			} elseif ($do == 'Deleted_Subject_Doctor') { 		// Deleted Course Doctor Page 
				delete("issr_subjects_doctors_registration", "id", "subjects.php?do=All_Subject_Doctor");

			} elseif ($do == 'Deleted_Subject_Student') { 		// Deleted Course Student Page 
				delete("issr_subjects_students_registration", "id", "subjects.php?do=All_Subject_Student");

			} elseif ($do == 'Active_Subject') { 		// Active Course Page 
				active("done", "$table", "active", "1", "subjects.php");

			} elseif ($do == 'NO_Active_Subject') { 		// NO Active Course Page 
				active("no", "$table", "active", "0", "subjects.php");

			}

		include $tpl .'footer.php'; 
	} else {
		header('Location: index.php');   // Redirect To index Page
		exit();
	}
	ob_end_flush();
?>