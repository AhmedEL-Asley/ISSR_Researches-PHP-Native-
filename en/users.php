<?php
	ob_start();
	session_start();
	$pageTitle = 'Users Page';
	$table = "issr_users";
	$dashboard = "dashboard.php";
	if (isset($_SESSION['username'])) {
		include 'init.php';
			$do = isset($_GET['do']) ? $_GET['do'] : 'All';

			if ($do == 'All') { 			// All Users Page
			} elseif ($do == 'All_Administrators') { 		// All Administrator Uesrs Page 
				getTable("persons", "all_administrators", "Administrator Page", "Administrator Page", "", "", "*", "$table", "", "WHERE department_type = 0","","$table.id","ASC");

			} elseif ($do == 'All_Doctors') { 		// All Doctors Uesrs Page 
				getTable("persons", "all_doctors", "Doctors Page", "Doctors Page", "", "", "*", "$table", "", "WHERE department_type = 1","","$table.id","ASC");

			} elseif ($do == 'All_Students') { 		// All Students Uesrs Page 
				getTable("persons", "all_students", "Students Page", "Students Page", "", "", "*", "$table", "", "WHERE department_type = 2","","$table.id","ASC");
				
			} elseif ($do == 'Add_User') { 		// Add User Page 
				add("persons", "users", "Add New User", "?do=Insert_User");

			} elseif ($do == 'Insert_User') { 		// Insert User Page 
				insert("persons", "users", "$table", "users.php?do=All_Administrators");

			} elseif ($do == 'Add_Doctor') { 		// Add Doctor Page 
				add("persons", "doctors", "Add New User", "?do=Insert_Doctor");

			} elseif ($do == 'Insert_Doctor') { 		// Insert Doctor Page 
				insert("persons", "doctors", "$table", "users.php?do=All_Doctors");

			} elseif ($do == 'Add_Student') { 		// Add Student Page 
				add("persons", "students", "Add New User", "?do=Insert_Student");

			} elseif ($do == 'Insert_Student') { 		// Insert Student Page 
				insert("persons", "students", "$table", "users.php?do=All_Students");

			} elseif ($do == 'Edit_User') { 		// Edit User Page 
				edit("persons", "users", "Edit User", "?do=Update_User", "$table");

			} elseif ($do == 'Update_User') { 		// Update User Page 
				update("persons", "users", "$table", "dashboard.php");

			} elseif ($do == 'Password') { 		// Edit Password User Page 
				edit("persons", "password", "Change Password", "?do=UpdatePassword", "$table");

            } elseif ($do == 'UpdatePassword') { 	// Update Password User Page
				update("persons", "password", "$table", "$dashboard");

			} elseif ($do == 'Deleted_User') { 		// Deleted User Page 
				delete("$table", "id", "dashboard.php");

			} elseif ($do == 'Admin_User') { 		// Active Subject Page 
				active("done", "$table", "admin", "1", "dashboard.php");

			} elseif ($do == 'NO_Admin_User') { 		// NO Active Subject Page 
				active("no", "$table", "admin", "0", "dashboard.php");

			}

		include $tpl .'footer.php'; 
	} else {
		header('Location: index.php');   // Redirect To index Page
		exit();
	}
	ob_end_flush();
?>