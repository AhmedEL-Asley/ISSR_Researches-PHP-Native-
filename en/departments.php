<?php
	ob_start();
	session_start();
	$pageTitle = 'Departments Page';
	$table = "issr_departments";
	$dashboard = "dashboard.php";
	if (isset($_SESSION['username'])) {
		include 'init.php';
			$do = isset($_GET['do']) ? $_GET['do'] : 'All';

			if ($do == 'All') { 			// All Page
				getTable("subjects", "all_departments", "Departments Page", "Departments Page", "", "", "*", "$table", "",	"","","$table.id","ASC");

			} elseif ($do == 'Add_Debartment') { 		// Add Subject Page 
				add("subjects", "add_department", "Add New Debartment", "?do=Insert_Debartment");

			} elseif ($do == 'Insert_Debartment') { 		// Insert Subject Page 
				insert("subjects", "insert_department", "$table", "departments.php");

			} elseif ($do == 'Edit_Debartment') { 		// Edit Subject Page 
				edit("subjects", "edit_department", "Edit Debartment", "?do=Update_Debartment", "$table");

			} elseif ($do == 'Update_Debartment') { 		// Update Subject Page 
				update("subjects", "update_department", "$table", "departments.php");

			} elseif ($do == 'Deleted_Debartment') { 		// Add Page 
				delete("$table", "id", "departments.php");

			}

		include $tpl .'footer.php'; 
	} else {
		header('Location: index.php');   // Redirect To index Page
		exit();
	}
	ob_end_flush();
?>