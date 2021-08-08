<?php
	/*
		====== This function expresses the update data
		====== Name of the function
		====== update(condition, case, table, link)
	*/
	function update($condition, $case, $table, $link) {
		global $con;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if ($condition == "persons") {

				if ($case == "users") {
					// Variables
					$id 				= filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
					$name 				= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
					$phone 				= filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
					$address 			= filter_var($_POST['address'],FILTER_SANITIZE_STRING);
					$job 				= filter_var($_POST['job'],FILTER_SANITIZE_STRING);
					$notes 				= filter_var($_POST['notes'],FILTER_SANITIZE_STRING);

					// UPDATE Info In Database
					$stmt = $con->prepare("UPDATE $table SET name = ?, phone = ?, address = ?, job = ?, notes = ? WHERE id = ?");
					$stmt->execute(array($name, $phone, $address, $job, $notes, $id ));
				} elseif ($case == "doctors") {
				} elseif ($case == "students") {
				} elseif ($case == "password") {
					
					// Variables
					$id 				= filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
					$password 			= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
					$oldpassword 		= filter_var($_POST['oldpassword'],FILTER_SANITIZE_STRING);
					$hashedoldpassword 	= sha1($oldpassword);
					$newpassword 		= filter_var($_POST['newpassword'],FILTER_SANITIZE_STRING);
					$hashednewpassword 	= sha1($newpassword);

					if ($password === $hashedoldpassword) {
						// Validate The Form
						$formErrors = array();
						if (empty($formErrors)) {
							// UPDATE Info In Database
							$stmt = $con->prepare("UPDATE $table SET password = ? WHERE id = ?");
							$stmt->execute(array($hashednewpassword, $id ));
						}
					} else {
						error("Sorry, The Previous Password was Wrong");		
					}
				}

			} elseif ($condition == "subjects") {
				if ($case == "update_subject") {

					// Variables
					$id 		= filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
					$name 		= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
					$department = filter_var($_POST['department'],FILTER_SANITIZE_NUMBER_INT);
					$notes 		= filter_var($_POST['notes'],FILTER_SANITIZE_STRING);
					
					// UPDATE Info In Database
					$stmt = $con->prepare("UPDATE $table SET name = ?, department = ?, notes = ? WHERE id = ?");
					$stmt->execute(array($name, $department, $notes, $id ));
				} elseif ($case == "update_department") {

					// Variables
					$id 		= filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
					$name 		= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
					
					// UPDATE Info In Database
					$stmt = $con->prepare("UPDATE $table SET name = ? WHERE id = ?");
					$stmt->execute(array($name, $id ));
				}
			}

			$theMsg = $stmt->rowCount();

			redirectHome($theMsg, "back", $link);

		}
		$con = null;
	}

