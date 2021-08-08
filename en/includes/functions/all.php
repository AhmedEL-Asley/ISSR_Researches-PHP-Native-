<?php
	/*
		====== This function expresses the data displayed in a table
		====== Name of the function
		====== getTable(condition, case, nameHeader, title, path, link, field, table, innerJoin, where, and, orderfield, ordering)
	*/
	function getTable($condition, $case, $nameHeader, $title, $path, $link, $field, $table, $innerJoin, $where, $and, $orderfield, $ordering) {
		global  $setting, $user, $con;
		getUserSession($user);
		$user_Id = $_SESSION['id'];

		$value = getAll("$field","$table","$innerJoin","$where","$and","$orderfield","$ordering");

			getHeader($nameHeader);
			?>
			<section class="content"> 
				<div class="row">
					<div class="col-lg-12">
						<?php //formAdd(); ?>
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title page-header text-center"><?php echo $title ?> </h3>
							</div>
							<div class="panel-body">
								<div class="box-body ">
									<div class="table-responsive">
										<table id="myTable" class="table table-striped text-center" >
											<?php if ($condition == "persons") { ?>

												<?php if ($case == "all_persons") { ?>

												<?php } elseif ($case == "all_administrators") {?>
													<?php button("users.php?do=Add_User", " btn-sm bg-blue", "Add", "plus", "", "Add User New"); ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Name</th>
															<th>Username</th>
															<th>E-mail</th>
															<th>ID-Card</th>
															<th>Address</th>
															<th>Job</th>
															<th>Notes</th>
															<th><i class="fa fa-gears"></i></th>
														</tr>
													</thead>
													<tbody>
														<?php
														$serial=0;
														foreach($value as $key) {
															$user_Id = $key['id'] ;
															$serial +=1;
															echo "<tr>";
																echo "<td>" . $serial . "</td>";
																echo "<td>" . $key["name"] . "</td>";
																echo "<td>" . $key["username"] . "</td>";
																echo "<td>" . $key["email"] . "</td>";
																echo "<td>" . $key["national_id"] . "</td>";
																echo "<td>" . $key["address"] . "</td>";
																echo "<td>" . $key["job"] . "</td>";
																echo "<td>" . $key["notes"] . "</td>";
																echo "<td>";
																	if ($key["admin"] == 0 ) {
																		button("users.php?do=Admin_User&id=" . $user_Id . "", "btn-primary btn-xs", "Active User", "check", "");
																	} elseif ($key["admin"] == 1 ) {
																		button("users.php?do=NO_Admin_User&id=" . $user_Id . "", "btn-warning btn-xs", "Not Avtive User", "close", "");
																	}
																	button("users.php?do=Edit_User&id=" . $user_Id . "", "btn-success btn-xs", "Edit User", "edit", "");
																	button("users.php?do=Deleted_User&id=" . $user_Id . "", "btn-danger btn-xs", "Deleted User", "trash", "");
																echo "</td>";
															echo "</tr>";
														}
														?>
													</tbody>
												<?php } elseif ($case == "all_doctors") {?>
													<?php button("users.php?do=Add_Doctor", " btn-sm bg-blue", "Add", "plus", "", "Add Doctor New"); ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Names</th>
															<th>Username</th>
															<th>NO. Courses</th>
															<th>NO. Papers Received</th>
															<th>NO. Accepted Papers</th>
															<th>NO. Rejected Papers</th>
															<th><i class="fa fa-gears"></i></th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$serial=0;
														foreach($value as $key) {
															$doctor_Id = $key['id'] ;
															$count_Courses = countItems("issr_subjects_doctors_registration.id", "issr_subjects_doctors_registration", "", "WHERE issr_subjects_doctors_registration.doctor = $doctor_Id", "");
															$papers_Registered = countItems("issr_upload_researches.id", "issr_subjects", "INNER JOIN issr_upload_researches ON issr_subjects.id = issr_upload_researches.subject INNER JOIN issr_subjects_doctors_registration ON issr_subjects.id = issr_subjects_doctors_registration.subject", "WHERE issr_subjects_doctors_registration.doctor = $doctor_Id", "");
															$accepted_Papers = countItems("issr_upload_researches.id", "issr_subjects", "INNER JOIN issr_upload_researches ON issr_subjects.id = issr_upload_researches.subject INNER JOIN issr_subjects_doctors_registration ON issr_subjects.id = issr_subjects_doctors_registration.subject", "WHERE issr_subjects_doctors_registration.doctor = $doctor_Id", "AND issr_upload_researches.status = 1");
															$rejected_Papers = countItems("issr_upload_researches.id", "issr_subjects", "INNER JOIN issr_upload_researches ON issr_subjects.id = issr_upload_researches.subject INNER JOIN issr_subjects_doctors_registration ON issr_subjects.id = issr_subjects_doctors_registration.subject", "WHERE issr_subjects_doctors_registration.doctor = $doctor_Id", "AND issr_upload_researches.status = 2");
															$serial +=1;
															echo "<tr>";
																echo "<td>" . $serial . "</td>";
																echo "<td>" . $key["name"] . "</td>";
																echo "<td>" . $key["username"] . "</td>";
																echo "<td><span class='label label-primary'>" . $count_Courses . "</span></td>";
																echo "<td><span class='label label-primary'>" . $papers_Registered . "</span></td>";
																echo "<td><span class='label label-success'>" . $accepted_Papers . "</span></td>";
																echo "<td><span class='label label-danger'>" . $rejected_Papers . "</span></td>";
																echo "<td>";
																	if ($key["admin"] == 0 ) {
																		button("users.php?do=Admin_User&id=" . $doctor_Id . "", "btn-primary btn-xs", "Active User", "check", "");
																	} elseif ($key["admin"] == 1 ) {
																		button("users.php?do=NO_Admin_User&id=" . $doctor_Id . "", "btn-warning btn-xs", "Not Avtive User", "close", "");
																	}
																	button("users.php?do=Edit_User&id=" . $doctor_Id . "", "btn-success btn-xs", "Edit User", "edit", "");
																	button("users.php?do=Deleted_User&id=" . $doctor_Id . "", "btn-danger btn-xs", "Deleted User", "trash", "");
																echo "</td>";
															echo "</tr>";
														}
													?>
													</tbody>
												<?php } elseif ($case == "all_students") {?>
													<?php button("users.php?do=Add_Student", " btn-sm bg-blue", "Add", "plus", "", "Add Student New"); ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Names</th>
															<th>Username</th>
															<th>NO. Courses</th>
															<th>NO. Papers Received</th>
															<th>NO. Accepted Papers</th>
															<th>NO. Rejected Papers</th>
															<th><i class="fa fa-gears"></i></th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$serial=0;
														foreach($value as $key) {
															$student_Id = $key['id'] ;

															$count_Courses = countItems("issr_subjects_students_registration.id", "issr_subjects_students_registration", "", "WHERE issr_subjects_students_registration.student = $student_Id", "");
															$papers_Registered = countItems("issr_upload_researches.id", "issr_upload_researches", "", "WHERE issr_upload_researches.student = $student_Id", "");
															$accepted_Papers = countItems("issr_upload_researches.id", "issr_upload_researches", "", "WHERE issr_upload_researches.student = $student_Id", "AND issr_upload_researches.status = 1");
															$rejected_Papers = countItems("issr_upload_researches.id", "issr_upload_researches", "", "WHERE issr_upload_researches.student = $student_Id", "AND issr_upload_researches.status = 2");

															$serial +=1;
															echo "<tr>";
																echo "<td>" . $serial . "</td>";
																echo "<td>" . $key["name"] . "</td>";
																echo "<td>" . $key["username"] . "</td>";
																echo "<td><span class='label label-info'>" . $count_Courses . "</span></td>";
																echo "<td><span class='label label-primary'>" . $papers_Registered . "</span></td>";
																echo "<td><span class='label label-success'>" . $accepted_Papers . "</span></td>";
																echo "<td><span class='label label-danger'>" . $rejected_Papers . "</span></td>";
																echo "<td>";
																	if ($key["admin"] == 0 ) {
																		button("users.php?do=Admin_User&id=" . $student_Id . "", "btn-primary btn-xs", "Active User", "check", "");
																	} elseif ($key["admin"] == 1 ) {
																		button("users.php?do=NO_Admin_User&id=" . $student_Id . "", "btn-warning btn-xs", "Not Avtive User", "close", "");
																	}
																	button("users.php?do=Edit_User&id=" . $student_Id . "", "btn-success btn-xs", "Edit User", "edit", "");
																	button("users.php?do=Deleted_User&id=" . $student_Id . "", "btn-danger btn-xs", "Deleted User", "trash", "");
																echo "</td>";
															echo "</tr>";
														}
													?>
													</tbody>
												<?php } ?>

											<?php } elseif ($condition == "subjects") {?>
												<?php if ($case == "all_departments") { ?>
													<?php button("departments.php?do=Add_Debartment", "btn-primary btn-xs", "Add New Debartment", "plus", "", "Add New Debartment");?>
												<thead>
													<tr>
														<th>#</th>
														<th>Names Of Debartments</th>
														<th>NO. Courses</th>
														<th><i class="fa fa-gears"></i></th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$serial=0;
													foreach($value as $key) {
														$department_Id = $key['id'] ;
														$count_Courses = countItems("issr_subjects.id", "issr_subjects", "INNER JOIN issr_departments ON issr_subjects.department = issr_departments.id", "WHERE issr_subjects.department = $department_Id", "");

														$serial +=1;
														echo "<tr>";
															echo "<td>" . $serial . "</td>";
															echo "<td>" . $key["name"] . "</td>";
															echo "<td><span class='label label-primary'>" . $count_Courses . "</span></td>";
															echo "<td>";
																button("departments.php?do=Edit_Debartment&id=" . $department_Id . "", "btn-success btn-xs", "Edit Course", "edit", "");
																button("departments.php?do=Deleted_Debartment&id=" . $department_Id . "", "btn-danger btn-xs", "Deleted Course", "trash", "");
															echo "</td>";
														echo "</tr>";
													}
												?>
												</tbody>
													
												<?php } elseif ($case == "all_subjects") {?>
													<?php button("subjects.php?do=Add_Subject", "btn-primary btn-xs", "Add New Course", "plus", "", "Add New Course");?>
												<thead>
													<tr>
														<th>#</th>
														<th>Courses</th>
														<th>Debartments</th>
														<th>NO. Students Registered</th>
														<th>NO. Papers Received</th>
														<th>NO. Accepted Papers</th>
														<th>NO. Rejected Papers</th>
														<th><i class="fa fa-gears"></i></th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$serial=0;
													foreach($value as $key) {
														$subject_Id = $key['id'] ;
														$students_Registered = countItems("issr_subjects_students_registration.id", "issr_subjects_students_registration", "INNER JOIN issr_subjects ON issr_subjects_students_registration.subject = issr_subjects.id", "WHERE issr_subjects_students_registration.subject = $subject_Id", "");
														$papers_Registered = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.subject = $subject_Id", "");
														$accepted_Papers = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.subject = $subject_Id", "AND issr_upload_researches.status = 1");
														$rejected_Papers = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.subject = $subject_Id", "AND issr_upload_researches.status = 0");

														$serial +=1;
														echo "<tr>";
															echo "<td>" . $serial . "</td>";
															echo "<td>" . $key["name"] . "</td>";
															echo "<td>" . $key["department_name"] . "</td>";
															echo "<td><span class='label label-info'>" . $students_Registered . "</span></td>";
															echo "<td><span class='label label-primary'>" . $papers_Registered . "</span></td>";
															echo "<td><span class='label label-success'>" . $accepted_Papers . "</span></td>";
															echo "<td><span class='label label-danger'>" . $rejected_Papers . "</span></td>";
															echo "<td>";
																if ($key["active"] == 0 ) {
																	button("subjects.php?do=Active_Subject&id=" . $subject_Id . "", "btn-primary btn-xs", "Active Course", "check", "");
																} elseif ($key["active"] == 1 ) {
																	button("subjects.php?do=NO_Active_Subject&id=" . $subject_Id . "", "btn-warning btn-xs", "Not Avtive Course", "close", "");
																}
															
																button("subjects.php?do=Edit_Subject&id=" . $subject_Id . "", "btn-success btn-xs", "Edit Course", "edit", "");
																button("subjects.php?do=Deleted_Subject&id=" . $subject_Id . "", "btn-danger btn-xs", "Deleted Course", "trash", "");
															echo "</td>";
														echo "</tr>";
													}
												?>
												</tbody>
												<?php } elseif ($case == "all_subjects_doctors") {?>
													<?php button("subjects.php?do=Add_Subject_Doctor", "btn-primary btn-xs", "Add New Course", "plus", "", "Course Registration");?>
													<thead>
														<tr>
															<th>#</th>
															<th>Courses</th>
															<th>Debartments</th>
															<th>NO. Students Registered</th>
															<th>NO. Papers Received</th>
															<th>NO. Papers Waiting</th>
															<th>NO. Accepted Papers</th>
															<th>NO. Rejected Papers</th>
															<th><i class="fa fa-gears"></i></th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$serial=0;
														foreach($value as $key) {
															$subjects_Registration_Id 	= $key['subjects_registration_id'] ;
															$subject_Id = $key['id'] ;
															$students_Registered = countItems("issr_subjects_students_registration.id", "issr_subjects_students_registration", "INNER JOIN issr_subjects ON issr_subjects_students_registration.subject = issr_subjects.id", "WHERE issr_subjects_students_registration.subject = $subject_Id", "AND issr_subjects_students_registration.student != 0");
															$papers_Registered = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.subject = $subject_Id", "");
															$papers_Waiting = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.subject = $subject_Id", "AND issr_upload_researches.status = 0");
															$accepted_Papers = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.subject = $subject_Id", "AND issr_upload_researches.status = 1");
															$rejected_Papers = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.subject = $subject_Id", "AND issr_upload_researches.status = 2");

															$serial +=1;
															echo "<tr>";
																echo "<td>" . $serial . "</td>";
																echo "<td>" . $key["name"] . "</td>";
																echo "<td>" . $key["department_name"] . "</td>";
																echo "<td><span class='label label-info'>" . $students_Registered . "</span></td>";
																echo "<td><span class='label label-primary'>" . $papers_Registered . "</span></td>";
																echo "<td><span class='label label-warning'>" . $papers_Waiting . "</span></td>";
																echo "<td><span class='label label-success'>" . $accepted_Papers . "</span></td>";
																echo "<td><span class='label label-danger'>" . $rejected_Papers . "</span></td>";
																echo "<td>";
																	button("subjects.php?do=Deleted_Subject_Doctor&id=" . $subjects_Registration_Id . "", "btn-danger btn-xs", "Deleted Course", "trash", "");
 																echo "</td>";
															echo "</tr>";
														}
													?>
													</tbody>
												<?php } elseif ($case == "all_subjects_students") {?>
													<?php button("subjects.php?do=Add_Subject_Student", "btn-primary btn-xs", "Add New Course", "plus", "", "Course Registration");?>

														<thead>
															<tr>
																<th>#</th>
																<th>Courses</th>
																<th>Doctors</th>
																<th>Debartments</th>
																<th>NO. Papers Received</th>
																<th>NO. Papers Waiting</th>
																<th>NO. Accepted Papers</th>
																<th>NO. Rejected Papers</th>
																<th><i class="fa fa-gears"></i></th>
															</tr>
														</thead>
														<tbody>
														<?php 
															$serial=0;
															foreach($value as $key) {
																$serial +=1;
																$subjects_Registration_Id 	= $key['subjects_registration_id'] ;
																$subject_Id = $key['id'] ;
																$papers_Registered = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.student = $user_Id", "AND issr_upload_researches.subject = $subject_Id");
																$papers_Waiting = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.student = $user_Id", "AND issr_upload_researches.subject = $subject_Id AND issr_upload_researches.status = 0");
																$accepted_Papers = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.student = $user_Id", "AND issr_upload_researches.subject = $subject_Id AND issr_upload_researches.status = 1");
																$rejected_Papers = countItems("issr_upload_researches.id", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id", "WHERE issr_upload_researches.student = $user_Id", "AND issr_upload_researches.subject = $subject_Id AND issr_upload_researches.status = 2");

																//Get Name Doctor
																$getOne = getOne("issr_users.name AS doctor_name,issr_subjects_doctors_registration.*", "issr_users", "INNER JOIN issr_subjects_doctors_registration ON issr_users.id = issr_subjects_doctors_registration.doctor", "WHERE issr_subjects_doctors_registration.subject = ?", "", "$subject_Id");
																
																echo "<tr>";
																	echo "<td>" . $serial . "</td>";
																	echo "<td>" . $key["name"] . "</td>";
																	echo "<td>" . $getOne["doctor_name"] . "</td>";
																	echo "<td>" . $key["department_name"] . "</td>";
																	echo "<td><span class='label label-primary'>" . $papers_Registered . "</span></td>";
																	echo "<td><span class='label label-warning'>" . $papers_Waiting . "</span></td>";
																	echo "<td><span class='label label-success'>" . $accepted_Papers . "</span></td>";
																	echo "<td><span class='label label-danger'>" . $rejected_Papers . "</span></td>";
																	echo "<td>";
																		button("subjects.php?do=Deleted_Subject_Student&id=" . $subjects_Registration_Id . "", "btn-danger btn-xs", "Deleted Course", "trash", "");
																	echo "</td>";
																echo "</tr>";
															}
														?>
														</tbody>													
												<?php } ?>

											<?php } elseif ($condition == "researches") {?>
												<?php if ($case == "all_researches") {?>
												<thead>
													<tr>
														<th>#</th>
														<th>Search Code</th>
														<th>Delivery Date</th>
														<th>Student</th>
														<th>Course</th>
														<th>View Search</th>
														<th>Doctor</th>
														<th>Status</th>
														<th>Notes</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$serial=0;
													foreach($value as $key) {
														$researches_Id 	= $key['id'] ;
														$subject_Id 	= $key['subject_id'] ;
														$serial 	 	+=1;
														
														//Get Name Doctor
														$getOne = getOne("issr_users.name AS doctor_name", "issr_users", "INNER JOIN issr_subjects_doctors_registration ON issr_users.id = issr_subjects_doctors_registration.doctor", "WHERE issr_subjects_doctors_registration.subject =  $subject_Id", "", "");

														echo "<tr>";
															echo "<td>" . $serial . "</td>";
															echo "<td>" . $key["code"] . "</td>";
															echo "<td>" . date("l : Y/m/d H:i:s a",strtotime($key['date'])) . "</td>";
															echo "<td>" . $key["student_name"] . "</td>";
															echo "<td>" . $key["subject_name"] . "</td>";
															echo "<td><a href='uploads/researches_files/" . $key["file"] . "' target='_blank' ><img src='layout/img/file.svg' width='20px'></a></td>";
															echo "<td>" . $getOne["doctor_name"] . "</td>";
															echo "<td>";
																if ($key["status"] == 0) {
																	echo "<span class='label label-primary'>Waitting</span>";
																} elseif ($key["status"] == 1) {
																	echo "<span class='label label-success'>Approved</span>";
																} elseif ($key["status"] == 2) {
																	echo "<span class='label label-danger'>Refused</span>";
																}	
															echo"</td>";
															echo "<td>";
																if (empty($key["notes"])) {
																	echo "No Found Notes";
																} elseif ($key["notes"] == " ") {
																	echo "No Found Notes";
																} else {
																	echo $key["notes"];
																}	
															echo"</td>";
														echo "</tr>";
													}
												?>
												</tbody>
												<?php } elseif ($case == "all_researches_doctors") {?>
													<thead>
														<tr>
															<th>#</th>
															<th>Search Code</th>
															<th>Delivery Date</th>
															<th>Student</th>
															<th>Course</th>
															<th>View Search</th>
															<th>Status</th>
															<th>Notes</th>
															<th><i class="fa fa-gears"></i></th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$serial=0;
														foreach($value as $key) {
															$researches_Id 	= $key['id'] ;
															$subject_Id 	= $key['subject_id'] ;
															$serial 	 	+=1;

															echo "<tr>";
																echo "<td>" . $serial . "</td>";
																echo "<td>" . $key["code"] . "</td>";
																echo "<td>" . date("l : Y/m/d H:i:s a",strtotime($key['date'])) . "</td>";
																echo "<td>" . $key["student_name"] . "</td>";
																echo "<td>" . $key["subject_name"] . "</td>";
																echo "<td><a href='uploads/researches_files/" . $key["file"] . "' target='_blank' ><img src='layout/img/file.svg' width='20px'></a></td>";
																echo "<td>";
																	if ($key["status"] == 0) {
																		echo "<span class='label label-primary'>Waitting</span>";
																	} elseif ($key["status"] == 1) {
																		echo "<span class='label label-success'>Approved</span>";
																	} elseif ($key["status"] == 2) {
																		echo "<span class='label label-danger'>Refused</span>";
																	}	
																echo"</td>";
																echo "<td>";
																	if (empty($key["notes"])) {
																		echo "No Found Notes";
																	} elseif ($key["notes"] == " ") {
																		echo "No Found Notes";
																	} else {
																		echo $key["notes"];
																	}	
																echo"</td>";															
																echo "<td>";
																if ($key["status"] == 0) {
																	button("researches.php?do=Approved_Researches&id=$researches_Id", "btn-success btn-xs", "Approved", "check", "");
																	button("researches.php?do=Refused_Researches&id=$researches_Id", "btn-danger btn-xs", "Refused", "close", "");
																} elseif ($key["status"] == 1) {
																	button("researches.php?do=Refused_Researches&id=$researches_Id", "btn-danger btn-xs", "Refused", "close", "");
																} elseif ($key["status"] == 2) {
																	button("researches.php?do=Approved_Researches&id=$researches_Id", "btn-success btn-xs", "Approved", "check", "");
																}
																echo "</td>";
															echo "</tr>";
														}
													?>
													</tbody>
												<?php } elseif ($case == "all_researches_students") {?>
													<thead>
														<tr>
															<th>#</th>
															<th>Search Code</th>
															<th>Delivery Date</th>
															<th>Course</th>
															<th>View Search</th>
															<th>Doctor</th>
															<th>Status</th>
															<th>Notes</th>
															<th><i class="fa fa-gears"></i></th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$serial=0;
														foreach($value as $key) {
															$researches_Id 	= $key['id'] ;
															$subject_Id 	= $key['subject_id'] ;
															$serial 	 	+=1;

															//Get Name Doctor
															$getOne = getOne("issr_users.name AS doctor_name", "issr_users", "INNER JOIN issr_subjects_doctors_registration ON issr_users.id = issr_subjects_doctors_registration.doctor", "WHERE issr_subjects_doctors_registration.subject =  $subject_Id", "", "");

															echo "<tr>";
																echo "<td>" . $serial . "</td>";
																echo "<td>" . $key["code"] . "</td>";
																echo "<td>" . date("l : Y/m/d H:i:s a",strtotime($key['date'])) . "</td>";
																echo "<td>" . $key["subject_name"] . "</td>";
																echo "<td><a href='uploads/researches_files/" . $key["file"] . "' target='_blank' ><img src='layout/img/file.svg' width='20px'></a></td>";
																echo "<td>" . $getOne["doctor_name"] . "</td>";
																echo "<td>";
																	if ($key["status"] == 0) {
																		echo "<span class='label label-primary'>Waitting</span>";
																	} elseif ($key["status"] == 1) {
																		echo "<span class='label label-success'>Approved</span>";
																	} elseif ($key["status"] == 2) {
																		echo "<span class='label label-danger'>Refused</span>";
																	}	
																echo"</td>";
																echo "<td>";
																	if (empty($key["notes"])) {
																		echo "No Found Notes";
																	} elseif ($key["notes"] == " ") {
																		echo "No Found Notes";
																	} else {
																		echo $key["notes"];
																	}	
																echo"</td>";															
																echo "<td>";
																	button("researches.php?do=Deleted_Researches_Student&id=" . $researches_Id . "", "btn-danger btn-xs", "Deleted Researches", "trash", "");
																echo "</td>";
															echo "</tr>";
														}
													?>
													</tbody>
												<?php } ?>

											<?php } ?>
										</table>
									</div>
								</div>
							</div>		
						</div>
					</div>
					<!-- /.col-lg-12 -->
				</div>
			</section>
		<?php
	}
