<?php
	/*
		====== This function expresses the Insert data
		====== Name of the function
		====== insert(condition, case, table, link)
	*/
	function insert($condition, $case, $table, $link) {
		global $con;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if ($condition == "persons") {
				// Variables
				$name 				= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
				$phone 				= filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
				$username 			= filter_var($_POST['username'],FILTER_SANITIZE_STRING);
				$email 				= filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
				$national_id 		= filter_var($_POST['national_id'],FILTER_SANITIZE_NUMBER_INT);
				$password 			= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
				$hashedpassword 	= sha1($password);
				$address 			= filter_var($_POST['address'],FILTER_SANITIZE_STRING);
				$notes 				= filter_var($_POST['notes'],FILTER_SANITIZE_STRING);

				if ($case == "users") {
					// Variables
					$job 			= filter_var($_POST['job'],FILTER_SANITIZE_STRING);

					// Insert UserInfo In Database
					$stmt = $con->prepare("INSERT INTO $table (name, phone, username, email, national_id, password, department_type, address, job, notes) 
					VALUES (:name, :phone, :username, :email, :national_id, :password, 0, :address, :job, :notes)");
					$stmt->execute(array('name' => $name, 'phone' => $phone, 'username' => $username, 'email' => $email,
					'national_id' => $national_id, 'password' => $hashedpassword, 'address' => $address, 'job' => $job, 'notes' => $notes));

				} elseif ($case == "doctors") {
					// Insert UserInfo In Database
					$stmt = $con->prepare("INSERT INTO $table (name, phone, username, email, national_id, password, department_type, address, notes) 
					VALUES (:name, :phone, :username, :email, :national_id, :password, 1, :address, :notes)");
					$stmt->execute(array('name' => $name, 'phone' => $phone, 'username' => $username, 'email' => $email,
					'national_id' => $national_id, 'password' => $hashedpassword, 'address' => $address, 'notes' => $notes));
				} elseif ($case == "students") {
					// Variables
					$department 	= filter_var($_POST['department'],FILTER_SANITIZE_NUMBER_INT);

					// Insert UserInfo In Database
					$stmt = $con->prepare("INSERT INTO $table (name, phone, username, email, national_id, password, department_type, address, department, notes) 
					VALUES (:name, :phone, :username, :email, :national_id, :password, 2, :address, :department, :notes)");
					$stmt->execute(array('name' => $name, 'phone' => $phone, 'username' => $username, 'email' => $email,
					'national_id' => $national_id, 'password' => $hashedpassword, 'address' => $address, 'department' => $department, 'notes' => $notes));

				}
			} elseif ($condition == "subjects") {
				if ($case == "insert_department") {

					// Variables
					$name 		= filter_var($_POST['name'],FILTER_SANITIZE_STRING);

					// Insert UserInfo In Database
					$stmt = $con->prepare("INSERT INTO $table (name) VALUES (:name)");
					$stmt->execute(array('name' => $name ));

				} elseif ($case == "insert_subject") {
					
					// Variables
					$name 		= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
					$department = filter_var($_POST['department'],FILTER_SANITIZE_NUMBER_INT);
					$notes 		= filter_var($_POST['notes'],FILTER_SANITIZE_STRING);

					// Insert UserInfo In Database
					$stmt = $con->prepare("INSERT INTO $table (name, department, notes) VALUES (:name, :department, :notes)");
					$stmt->execute(array('name' => $name, 'department' => $department, 'notes' => $notes ));

				} elseif ($case == "insert_subject_doctor") {
					
					// Variables
					$subject 		= filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
					$doctor 		= $_SESSION['id'];

					// Insert UserInfo In Database
					$stmt = $con->prepare("INSERT INTO $table (subject, doctor) VALUES (:subject, :doctor)");
					$stmt->execute(array('subject' => $subject, 'doctor' => $doctor ));

				} elseif ($case == "insert_subject_student") {
					
					// Variables
					$subject 		= filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
					$student 		= $_SESSION['id'];

					// Insert UserInfo In Database
					$stmt = $con->prepare("INSERT INTO $table (subject, student) VALUES (:subject, :student)");
					$stmt->execute(array('subject' => $subject, 'student' => $student ));

				} elseif ($case == "upload_researches") {
					
					// Variables
					$date 		= date("Y-m-d h:i:s");
					$notes 		= filter_var($_POST['notes'],FILTER_SANITIZE_STRING);
					$subject 	= filter_var($_POST['subject'],FILTER_SANITIZE_NUMBER_INT);
					$student 	= $_SESSION['id'];
					$doctor = getOne("*", "issr_subjects_doctors_registration", "", "WHERE issr_subjects_doctors_registration.subject = ?", "", "$subject");
					$doctor = $doctor['doctor'];

					$studentCode = getOne("*", "issr_users", "", "WHERE issr_users.id = ?", "", "$student");
					$student_code = $studentCode['username'];

					$subjectCode = getOne("*", "issr_subjects", "", "WHERE issr_subjects.id = ?", "", "$subject");
					$subject_code = $subjectCode['code'];

					$code = $student_code . "-". $subject_code . "-". rand(0, 9999);
 
					$avatarName = $_FILES['file']['name'];
					$avatarSize = $_FILES['file']['size'];
					$avatarTmp  = $_FILES['file']['tmp_name'];
					$avatarType = $_FILES['file']['type'];
					//$avatarAllowedExtension = array("pdf", "docx", "jpeg", "jpg", "png", "gif", "rar");
					$ex = explode('.', $avatarName );
					$avatarExtension = strtolower(end($ex));
					$researches_files = $code . $avatarName ;
					move_uploaded_file($avatarTmp, "uploads//researches_files//" . $researches_files);


					// Insert UserInfo In Database
					$stmt = $con->prepare("INSERT INTO $table (date, code, file, notes, subject, student, doctor ) VALUES (:date, :code, :researchesfiles, :notes, :subject, :student, :doctor)");
					$stmt->execute(array('date' => $date, 'code' => $code, 'researchesfiles' => $researches_files, 'notes' => $notes, 'subject' => $subject, 'student' => $student, 'doctor' => $doctor ));
				}



			}

			//$theMsg = $stmt->rowCount();
			redirectHome($stmt->rowCount(), "back", $link);

		}
		$con = null;
	}
