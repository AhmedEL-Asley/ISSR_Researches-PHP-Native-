
<?php

	/*
		== This function expresses about Title Page
		== Name of the function
		== getTitle()
	*/
	function getTitle()	{
		global $pageTitle;
		if (isset($pageTitle)) {
			echo $pageTitle;
		} else {
			echo 'Home';
		}
	}

	/*
		====== This function expresses Go To Link Page
		====== Name of the function
		====== redirectHome(theMsg, url= null, url_link= null, seconds = 0.0001)
	*/
	function redirectHome($theMsg, $url= null, $url_link= null, $seconds = 0.0001)	{
		if ($url === null) {
			$url = 'index.php';
			$link = 'Home';
		} else {
			$url = $url_link;
		}
		echo $theMsg;
		header("refresh:$seconds;url=$url");
		exit();

	}

	/*
		====== This function expresses About Get On one item Data
		====== Name of the function
		====== getOne(field, table, innerJoin, where, and, execute)
	*/
	function getOne($field, $table, $innerJoin, $where, $and, $execute) {
		global $con;
		$getOne = $con->prepare("SELECT $field FROM $table $innerJoin $where $and ");
		$getOne->execute(array($execute));
		$one = $getOne->fetch();
		return $one;
		$con = null;
	}

	/*
		====== This function expresses About Get On All Data
		====== Name of the function
		====== getAll(field, table, innerJoin, where, and, orderfield, ordering)
	*/
	function getAll($field, $table, $innerJoin, $where, $and, $orderfield, $ordering) {
		global $con;
		$getAll = $con->prepare("SELECT $field FROM $table $innerJoin $where $and ORDER BY $orderfield $ordering");
		$getAll->execute();
		$all = $getAll->fetchAll();
		return $all;
		$con = null;
	}

	/*
		====== This function expresses About Calculate Sum Items
		====== Name of the function
		====== sumItems(field, table, innerJoin, where, and)
	*/
	function sumItems($field, $table, $innerJoin, $where, $and)	{
		global $con;
		$statement1 = $con->prepare("SELECT SUM($field) FROM $table $innerJoin $where $and");
		$statement1->execute();
		$count1 = $statement1->fetchColumn();
		return $count1;
		$con = null;
	}

	/*
		====== This function expresses About Check Items
		====== Name of the function
		====== checkItem(field, table, innerJoin, and, select, execute)
	*/	
	function checkItem($field, $table, $execute)	{
		global $con;
		$statement = $con->prepare("SELECT $field FROM $table WHERE $field= ?");
		$statement->execute(array($execute));
		$count = $statement->rowCount();
		return $count;
		$con = null;
	}

	/*
		====== This function expresses About Calculate Max Items
		====== Name of the function
		====== maxItems(field, table, innerJoin, where, and)
	*/
	function maxItems($field, $table, $innerJoin, $where, $and)	{
		global $con;
		$statement1 = $con->prepare("SELECT MAX($field) FROM $table $innerJoin $where $and");
		$statement1->execute();
		$count1 = $statement1->fetchColumn();
		return $count1;
		$con = null;
	}

	/*
		====== This function expresses About Calculate Count Items
		====== Name of the function
		====== countItems(field, table, innerJoin, where, and)
	*/
	function countItems($field, $table, $innerJoin, $where, $and) {
		global $con;
		$statement1 = $con->prepare("SELECT COUNT($field) FROM $table $innerJoin $where $and");
		$statement1->execute();
		$count1 = $statement1->fetchColumn();
		return $count1;
		$con = null;
	}

	/*
		====== This function expresses About Get On Latest Data
		====== Name of the function
		====== getLatest(field, table, innerJoin, where, and, order, ordering, limit = 5 )
	*/
	function getLatest($field, $table, $innerJoin, $where, $and, $order, $ordering, $limit = 5 ) {
		global $con;
		$statement2 = $con->prepare("SELECT $field FROM $table $innerJoin $where $and ORDER BY $order $ordering LIMIT $limit ");
		$statement2->execute();
		$rows = $statement2->fetchAll();
		return $rows;
		$con = null;
	}

	/*
		====== This function expresses About Menu
		====== Name of the function
		====== menu(class, link, icon, color, name)
	*/
	function menu($class, $link, $icon, $color, $name){
		echo '<li class="'. $class . '">
				<a href="'. $link .'"> <i class="fa fa-'. $icon .' text-'. $color .'"></i> <span class=" text-'.$color .'">'. $name .'</span></a>
			</li>';
	}

	/*
		====== This function expresses About Get Header
		====== Name of the function
		====== getHeader(name)
	*/
	function getHeader($name) { 
		?>
			<section class="content-header">
				<h1><small>Control Panel</small> <?php echo $name ?></h1>
				<ol class="breadcrumb">
					<li><a href="dashboard.php" ><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active"><?php echo $name ?></li>
				</ol>
			</section>
		<?php
	}

	/*
		====== This function expresses About Get ID Username
		====== Name of the function
		====== user(submitValue)
	*/
	function user($submitValue){
		?>
			<div class="col-lg-12 text-center">
				<div class="panel panel-primary">
					<div class="panel-body">
						<input type="hidden" name="user" value="<?php echo $_SESSION['id'] ?>" >
						<input type = "submit" class = "btn btn-lg btn-primary" value = "<?php echo $submitValue; ?>" >
						<input type = "reset"  class = "btn btn-lg btn-warning" value = "Clear" >
					</div>
				</div>
			</div>
		<?php
	}

	/*
		====== This function expresses About Get Input
		====== Name of the function
		====== input(size, icon, type, name, class, value, $label, placeholder, required, autocomplete, readonly)
	*/
	function input($size, $icon, $type, $name, $class, $value, $label, $placeholder, $required, $autocomplete, $readonly){
		echo "<div class='$size'>";
			echo "<div class='form-group form-group-lg input-group'>";
				echo "<span class='input-group-addon text-blue' style='font-size:20px'><i class='fa fa-$icon'></i> $label</span>";
				echo "<input 
							type='$type'
							name='$name'
							class='form-control $class'
							value='$value'
							placeholder='$placeholder'
							$required
							autocomplete='$autocomplete'
							$readonly
						>";
			echo "</div>";
		echo "</div>";
	}

	/*
		====== This function expresses About Get select
		====== Name of the function
		====== select(size, icon, placeholder, name, class, field, table, innerJoin, where, and, orderfield, ordering, valueOption, option)
	*/
	function select($size, $icon, $placeholder, $name, $class, $field, $table, $innerJoin, $where, $and, $orderfield, $ordering, $valueOption, $option){
		?>
			<div class="<?php echo $size ?>">
				<div class="form-group form-group-lg input-group">
					<span class="input-group-addon  text-blue"><i class="fa fa-<?php echo $icon ?> fa-2x"></i> <?php echo $placeholder ?></span>
					<select name="<?php echo $name ?>" class="col-lg-12 <?php echo $class ?> form-control">
						<?php
						$value = getAll("$field","$table","$innerJoin","$where","$and","$orderfield","$ordering");
						foreach ($value as $key) {
						?>
							<option value="<?php echo $key["$valueOption"] ?>"><?php echo $key["$option"] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		<?php
	}

	/*
		====== This function expresses About Edit on Select
		====== Name of the function
		====== selectEdit(size, icon, placeholder, name, class, field, table, innerJoin, where, and, orderfield, ordering, valueOption, option, row, selected)
	*/
	function selectEdit($size, $icon, $placeholder, $name, $class, $field, $table, $innerJoin, $where, $and, $orderfield, $ordering, $valueOption, $option, $row, $selected){
		?>
		<div class="<?php echo $size ?>">
			<div class="form-group form-group-lg input-group">
				<span class="input-group-addon text-blue"><i class="fa fa-<?php echo $icon ?> fa-2x"></i> <?php echo $placeholder ?></span>
				<select name="<?php echo $name ?>" class="col-lg-12 <?php echo $class ?> form-control">
					<?php
						$value = getAll("$field","$table","$innerJoin","$where","$and","$orderfield","$ordering");
						foreach ($value as $key) {
					?>
						<option value="<?php echo $key["$valueOption"] ?>" <?php if ($row["$selected"] == $key['id'] ) {echo 'selected'; }?> ><?php echo $key["$option"] ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<?php
	}

	/*
		====== This function expresses About Button
		====== Name of the function
		====== button(link, class, title, icon, color)
	*/
	function button($link, $class, $title, $icon, $color, $value = NULL) {
		echo '<a href="' . $link .'" style="margin:2px 5px;font-size:14px;" class="btn confirm ' . $class .'" role="button" title="' . $title .'"><i class="fa fa-' . $icon . " " . $color .'"></i> ' . $value . '</a>';
	}

	/*
		====== This function expresses About Get User Session
		====== Name of the function
		====== getUserSession(user)
	*/
	function getUserSession($user) { 

		global $con, $user;
		$getUser = $con->prepare("SELECT * FROM issr_users WHERE issr_users.username = ? ");
		$getUser->execute(array($_SESSION['username'] ));
		$user = $getUser->fetch();
	}

	/*
		====== This function expresses About Add Form Data
		====== Name of the function
		====== formAdd(condition, case)
	*/
	function formAdd($condition, $case=NULL) {
		global  $user;
		getUserSession($user);
		$user_Id = $_SESSION['id'];
		$department = $user['department'];

		?>
		<div class="col-lg-12 text-center">
			<div class="panel panel-primary">
				<div class="panel-body">
					<?php
						if ($condition == "persons") {
							input("col-lg-4", "tag","text","name", "", "", "Full Name", "Full Name", "","off", "");
							input("col-lg-4", "user","text","username", "", "", "Username", "Username", "","off", "");
							input("col-lg-4", "lock","password","password", "password", "", "Password", "Password", "","off", "");
							if ($case == "users") {
								input("col-lg-4", "briefcase","text","job", "", "", "Job", "Job", "","off", "");

							} elseif ($case == "doctors") {
							} elseif ($case == "students") {
								select("col-lg-4", "tasks", "", "department", "", "*","issr_departments","","","","id","ASC", "id", "name");
							}
							input("col-lg-4", "phone","text","phone", "", "", "Phone", "Phone", "","off", "");
							input("col-lg-4", "envelope","text","email", "", "", "E-mail", "E-mail", "","off", "");
							input("col-lg-4", "newspaper-o","text","national_id", "", "", "ID-Card", "ID-Card", "","off", "");
							input("col-lg-8", "globe","text","address", "", "", "Address", "Address", "","off", "");
							input("col-lg-12", "file-text","text","notes", "", "", "Notes", "Notes", "","off", "");

						} elseif ($condition == "password") {
							input("col-lg-12", "lock","password","oldpassword", "password", "", "", "Old Password", "","off", "");
							input("col-lg-12", "lock","password","newpassword", "password", "", "", "New Password", "","off", "");
						
						} elseif ($condition == "subjects") {
							if ($case == "add_department") {
								input("col-lg-12", "tag","text","name", "", "", "", "Department Name", "","off", "");

							} elseif ($case == "add_subject") {
								input("col-lg-12", "tag","text","name", "", "", "", "Course Name", "","off", "");
								select("col-lg-12", "tasks", "", "department", "", "*","issr_departments","","","","id","ASC", "id", "name");
								input("col-lg-12", "file-text","text","notes", "", "", "", "Notes", "","off", "");

							} elseif ($case == "add_subject_doctor") {
								echo '<input type="hidden" name="user" id="user" value="' . $user_Id . '" > ';
								?>
									<div class="col-lg-6">
										<div class="form-group form-group-lg input-group">
											<span class="input-group-addon  text-blue"><i class="fa fa-tasks fa-2x"></i>  </span>
											<select name="department" id="department" class="col-lg-12  form-control"data-live-search="true" title="Select Department">
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group form-group-lg input-group">
											<span class="input-group-addon  text-blue"><i class="fa fa-tag fa-2x"></i>  </span>
											<select name="subject" id="subject" class="col-lg-12  form-control" data-live-search="true" title="Select Course">
											</select>
										</div>
									</div>
								<?php

							} elseif ($case == "add_subject_student") {
								select("col-lg-12", "tags", "", "subject", "", "*","issr_subjects","WHERE id NOT IN (SELECT subject FROM issr_subjects_students_registration WHERE student = $user_Id) AND id IN (SELECT subject FROM issr_subjects_doctors_registration )","AND issr_subjects.department = $department","AND issr_subjects.active = 1","id","ASC", "id", "name");

							} elseif ($case == "upload_researches") {
								input("col-lg-12", "link","file","file", "", "", "", "Choooose File", "","off", "");
								select("col-lg-12", "tasks", "", "subject", "", "issr_subjects.*, issr_departments.name AS department_name, issr_subjects_students_registration.id AS subjects_registration_id","issr_subjects","INNER JOIN issr_departments ON issr_subjects.department = issr_departments.id INNER JOIN issr_subjects_students_registration ON issr_subjects.id = issr_subjects_students_registration.subject","WHERE  issr_subjects_students_registration.student = $user_Id ","","issr_subjects.id","ASC", "id", "name");
								input("col-lg-12", "file-text","text","notes", "", "", "Notes", "Notes", "","off", "");
							}
						}
					?>
				</div>
			</div>
		</div>
		<?php
	}

	/*
		====== This function expresses About Edit Form Data
		====== Name of the function
		====== formEdit(condition, case, row)
	*/
	function formEdit($condition, $case, $row) {
		global  $user;
		getUserSession($user);
		?>
		<div class="col-lg-12 text-center">
			<div class="panel panel-primary">
				<div class="panel-body">
					<?php
						if ($condition == "persons") {
							if ($case == "users") {
								input("col-lg-6", "tag","text","name", "", $row['name'], "Full Name", "Full Name", "","off", "");
								input("col-lg-6", "tag","text","phone", "", $row['phone'], "Phone", "Phone", "","off", "");
								input("col-lg-8", "tag","text","address", "", $row['address'], "Address", "Address", "","off", "");
								input("col-lg-4", "tag","text","job", "", $row['job'], "Job", "Job", "","off", "");
								input("col-lg-12", "file-text","text","notes", "", $row['notes'], "Notes", "Notes", "","off", "");
							}
						} elseif ($condition == "subjects") {
							if ($case == "edit_subject") {
								input("col-lg-12", "tag","text","name", "", $row['name'], "", "Course Name", "required","off", "");
								selectEdit("col-lg-12", "tasks", "", "department", "", "*","issr_departments","","","","id","ASC", "id", "name", $row, "department");
								input("col-lg-12", "file-text","text","notes", "",  $row['notes'], "", "Notes", "","off", "");
							} elseif ($case == "edit_department") {
								input("col-lg-12", "tag","text","name", "", $row['name'], "", "Department Name", "required","off", "");
							}
						}
					?>
				</div>
			</div>
		</div>
		<?php
	}

	/*
		====== This function expresses About Deleted Data
		====== Name of the function
		====== delete(table, field, link)
	*/
	function delete($table, $field, $link) {

		global $con;
		$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
		$check = checkItem($field, $table, $id);
		if ($check > 0) {
			$stmt = $con->prepare("DELETE FROM $table WHERE $field = :field");
			$stmt->bindParam(":field", $id);
			$stmt->execute();
		}
		$theMsg = $stmt->rowCount();
		redirectHome($theMsg, 'back', $link);
		$con = null;

	}

	/*
		====== This function expresses About Active or Not Active Data
		====== Name of the function
		====== active(condition, table, field, value, link)
	*/
	function active($condition, $table, $field, $value, $link) {

		global $con;
		if ($condition == "done") {
			$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
			$stmt = $con->prepare("UPDATE $table SET $field = ? WHERE id = ? ");
			$stmt->execute(array($value, $id));

		} elseif ($condition == "no") {
			$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
			$stmt = $con->prepare("UPDATE $table SET $field = ? WHERE id = ? ");
			$stmt->execute(array($value, $id));

		}
			$theMsg = $stmt->rowCount();
			redirectHome($theMsg, 'back', $link);
			$con = null;
	}

	/*
		====== This function expresses About Data Box on Dashbord
		====== Name of the function
		====== box(size, color, count, title, icon, icon_color, link)
	*/
	function box($size, $color, $count, $title, $icon, $icon_color, $link){
		?>
		<div class="<?php echo $size; ?>">
			<!-- small box -->
			<div class="small-box bg-<?php echo $color; ?>">
				<div class="inner">
					<h3><?php echo $count; ?></h3>
					<p><?php echo $title; ?></p>
				</div>
				<div class="icon">
					<i class="fa fa-<?php echo $icon; ?> text-<?php echo $icon_color; ?>"></i>
				</div>
				<a href="<?php echo $link; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<?php
	}

	/*
		====== This function expresses About Display Data on Dashbord
		====== Name of the function
		====== dashboard(condition)
	*/
	function dashboard($condition){
		global  $con, $user;
		getUserSession($user);
		?>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<?php
					$user_Id = $_SESSION['id'];
					if ($condition == "Administrator") {
						box("col-lg-3 col-md-4 col-sm-6 col-xs-12", "blue", countItems('id', 'issr_departments', '', '', ''), "Departments", "tasks", "", "departments.php");
						box("col-lg-3 col-md-4 col-sm-6 col-xs-12", "blue", countItems('id', 'issr_subjects', '', '', ''), "Courses", "book", "", "subjects.php");
						box("col-lg-3 col-md-4 col-sm-6 col-xs-12", "blue", countItems('id', 'issr_users', '', 'WHERE department_type = 1', ''), "Doctors", "graduation-cap", "", "users.php?do=All_Doctors");
						box("col-lg-3 col-md-4 col-sm-6 col-xs-12", "blue", countItems('id', 'issr_users', '', 'WHERE department_type = 2', ''), "Students", "users", "", "users.php?do=All_Students");
						box("col-lg-3 col-md-4 col-sm-6 col-xs-12", "blue", countItems('id', 'issr_upload_researches', '', '', ''), "Researches", "files-o", "", "researches.php");
						box("col-lg-3 col-md-4 col-sm-6 col-xs-12", "orange", countItems('id', 'issr_upload_researches', '', 'WHERE status = 0', ''), "Waiting Papers", "spinner", "", "researches.php");
						box("col-lg-3 col-md-4 col-sm-6 col-xs-12", "green", countItems('id', 'issr_upload_researches', '', 'WHERE status = 1', ''), "Accepted Papers", "check-circle", "", "researches.php");
						box("col-lg-3 col-md-4 col-sm-6 col-xs-12", "red", countItems('id', 'issr_upload_researches', '', 'WHERE status = 2', ''), "Rejected Papers", "close", "", "researches.php");
					} elseif ($condition == "Doctor") {
						box("col-lg-3 col-md-6 col-sm-6 col-xs-12", "blue", countItems('id', 'issr_subjects_doctors_registration', '', 'WHERE doctor = ' .$user_Id, ''), "Courses", "book", "", "subjects.php?do=All_Subject_Doctor");
						box("col-lg-3 col-md-6 col-sm-6 col-xs-12", "blue", countItems('id', 'issr_upload_researches', '', 'WHERE doctor = ' .$user_Id, ''), "Researches", "files-o", "", "researches.php?do=All_Researches_Doctors");
						box("col-lg-2 col-md-4 col-sm-6 col-xs-12", "orange", countItems('id', 'issr_upload_researches', '', 'WHERE doctor = ' .$user_Id, 'AND status = 0'), "Waiting Papers", "spinner", "", "researches.php?do=All_Researches_Doctors");
						box("col-lg-2 col-md-4 col-sm-6 col-xs-12", "green", countItems('id', 'issr_upload_researches', '', 'WHERE doctor = ' .$user_Id, 'AND status = 1'), "Accepted Papers", "check-circle", "", "researches.php?do=All_Researches_Doctors");
						box("col-lg-2 col-md-4 col-sm-6 col-xs-12", "red", countItems('id', 'issr_upload_researches', '', 'WHERE doctor = ' .$user_Id, 'AND status = 2'), "Rejected Papers", "close", "", "researches.php?do=All_Researches_Doctors");
					} elseif ($condition == "Student") {
						box("col-lg-3 col-md-6 col-sm-6 col-xs-12", "blue", countItems('id', 'issr_subjects_students_registration', '', 'WHERE student = ' .$user_Id, ''), "Courses", "book", "", "subjects.php?do=All_Subject_Student");
						box("col-lg-3 col-md-6 col-sm-6 col-xs-12", "blue", countItems('id', 'issr_upload_researches', '', 'WHERE student = ' .$user_Id, ''), "Researches", "files-o", "", "researches.php?do=All_Researches_Students");
						box("col-lg-2 col-md-4 col-sm-6 col-xs-12", "orange", countItems('id', 'issr_upload_researches', '', 'WHERE student = ' .$user_Id, 'AND status = 0'), "Waiting Papers", "spinner", "", "researches.php?do=All_Researches_Students");
						box("col-lg-2 col-md-4 col-sm-6 col-xs-12", "green", countItems('id', 'issr_upload_researches', '', 'WHERE student = ' .$user_Id, 'AND status = 1'), "Accepted Papers", "check-circle", "", "researches.php?do=All_Researches_Students");
						box("col-lg-2 col-md-4 col-sm-6 col-xs-12", "red", countItems('id', 'issr_upload_researches', '', 'WHERE student = ' .$user_Id, 'AND status = 2'), "Rejected Papers", "close", "", "researches.php?do=All_Researches_Students");
					}
					
				?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Latest 7 Researches Uploaded</h3>

							<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-striped text-center">
									<?php if ($condition == "Administrator") { ?>
										<thead>
											<tr>
												<th>#</th>
												<th>Student</th>
												<th>Course</th>
												<th>Delivery Date</th>
												<th>Search Code</th>
												<th>View Search</th>
												<th>Doctor</th>
												<th>Status</th>
												<th>Notes</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$value = getLatest("issr_upload_researches.*, issr_subjects.id AS subject_id, issr_subjects.name AS subject_name, issr_users.name AS student_name", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id INNER JOIN issr_users ON issr_upload_researches.student = issr_users.id", "","","issr_upload_researches.id","DESC", "7");
											$serial=0;
											foreach($value as $key) {
												$researches_Id 	= $key['id'] ;
												$subject_Id 	= $key['subject_id'] ;
												$serial 	 	+=1;
												
												//Get Name Doctor
												$getOne = getOne("issr_users.name AS doctor_name", "issr_users", "INNER JOIN issr_subjects_doctors_registration ON issr_users.id = issr_subjects_doctors_registration.doctor", "WHERE issr_subjects_doctors_registration.subject =  $subject_Id", "", "");

												echo "<tr>";
													echo "<td>" . $serial . "</td>";
													echo "<td>" . $key["student_name"] . "</td>";
													echo "<td>" . $key["subject_name"] . "</td>";
													echo "<td>" . date("l : Y/m/d H:i:s a",strtotime($key['date'])) . "</td>";
													echo "<td>" . $key["code"] . "</td>";
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
									<?php } elseif ($condition == "Doctor") { ?>
										<thead>
											<tr>
												<th>#</th>
												<th>Student</th>
												<th>Course</th>
												<th>Delivery Date</th>
												<th>Search Code</th>
												<th>View Search</th>
												<th>Status</th>
												<th>Notes</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$value = getLatest("issr_upload_researches.*, issr_subjects.id AS subject_id, issr_subjects.name AS subject_name, issr_users.name AS student_name", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id INNER JOIN issr_users ON issr_upload_researches.student = issr_users.id", "WHERE doctor = $user_Id","","issr_upload_researches.id","DESC", "7");
											$serial=0;
											foreach($value as $key) {
												$researches_Id 	= $key['id'] ;
												$subject_Id 	= $key['subject_id'] ;
												$serial 	 	+=1;

												echo "<tr>";
													echo "<td>" . $serial . "</td>";
													echo "<td>" . $key["student_name"] . "</td>";
													echo "<td>" . $key["subject_name"] . "</td>";
													echo "<td>" . date("l : Y/m/d H:i:s a",strtotime($key['date'])) . "</td>";
													echo "<td>" . $key["code"] . "</td>";
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
												echo "</tr>";
											}
										?>
										</tbody>
									<?php } elseif ($condition == "Student") { ?>
										<thead>
											<tr>
												<th>#</th>
												<th>Course</th>
												<th>Delivery Date</th>
												<th>Search Code</th>
												<th>View Search</th>
												<th>Doctor</th>
												<th>Status</th>
												<th>Notes</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$value = getLatest("issr_upload_researches.*, issr_subjects.id AS subject_id, issr_subjects.name AS subject_name", "issr_upload_researches", "INNER JOIN issr_subjects ON issr_upload_researches.subject = issr_subjects.id INNER JOIN issr_users ON issr_upload_researches.student = issr_users.id", "WHERE student = $user_Id","","issr_upload_researches.id","DESC", "7");
											$serial=0;
											foreach($value as $key) {
												$researches_Id 	= $key['id'] ;
												$subject_Id 	= $key['subject_id'] ;
												$serial 	 	+=1;

												//Get Name Doctor
												$getOne = getOne("issr_users.name AS doctor_name", "issr_users", "INNER JOIN issr_subjects_doctors_registration ON issr_users.id = issr_subjects_doctors_registration.doctor", "WHERE issr_subjects_doctors_registration.subject =  $subject_Id", "", "");

												echo "<tr>";
													echo "<td>" . $serial . "</td>";
													echo "<td>" . $key["subject_name"] . "</td>";
													echo "<td>" . date("l : Y/m/d H:i:s a",strtotime($key['date'])) . "</td>";
													echo "<td>" . $key["code"] . "</td>";
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
									<?php } ?>
								</table>
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.box-body -->
						<div class="box-footer clearfix">
							<?php if ($condition == "Administrator") { ?>
							<a href="researches.php" class="btn btn-sm btn-default btn-flat pull-right">View All Researches</a>
							<?php } elseif ($condition == "Doctor") { ?>
								<a href="researches.php?do=All_Researches_Doctors" class="btn btn-sm btn-default btn-flat pull-right">View All Researches</a>
							<?php } elseif ($condition == "Student") { ?>
								<a href="researches.php?do=All_Researches_Students" class="btn btn-sm btn-default btn-flat pull-right">View All Researches</a>
							<?php } ?>
						</div>
						<!-- /.box-footer -->
					</div>
				</div>
			</div>
		</section>
		<?php
	}

	/*
	== This function expresses about Convert Date to Arabic Date
	== Name of the function
	== getDateArabicOfDate(getDate)
	*/
	function getDateArabicOfDate($getDate=NULL){

		$viewgetDate 	= $getDate;
		$nameday 		= date("l",strtotime($viewgetDate));
		$day			= date("d",strtotime($viewgetDate));
		$namemonth		= date("m",strtotime($viewgetDate));
		$year			= date("Y",strtotime($viewgetDate)); 
		$hours			= date("h",strtotime($viewgetDate)); 
		$minute			= date("i",strtotime($viewgetDate)); 
		$second			= date("s",strtotime($viewgetDate)); 
		$a				= date("a",strtotime($viewgetDate)); 

		switch ($a) {
			case "am":
				$a="صباحاً";
			break;
			case "pm":
				$a="مساءاً";
			break;
		}

		switch ($nameday) {
			case "Saturday":
				$nameday="السبت";
			break;
			case "Sunday":
				$nameday="الأحد";
			break;
			case "Monday":
				$nameday="الاثنين";
			break;
			case "Tuesday":
				$nameday="الثلاثاء";
			break;
			case "Wednesday":
				$nameday="الأربعاء";
			break;
			case "Thursday":
				$nameday="الخميس";
			break;
			case "Friday":
				$nameday="الجمعة";
			break;
		} 

		switch ($namemonth) {
			case 1:
				$namemonth="يناير";
			break;
			case 2:
				$namemonth="فبراير";
			break;
			case 3:
				$namemonth="مارس";
			break;
			case 4:
				$namemonth="إبريل";
			break;
			case 5:
				$namemonth="مايو";
			break;
			case 6:
				$namemonth="يونيو";
			break;
			case 7:
				$namemonth="يوليو";
			break;
			case 8:
				$namemonth="اغسطس";
			break;
			case 9:
				$namemonth="سبتمبر";
			break;
			case 10:
				$namemonth="اكتوبر";
			break;
			case 11:
				$namemonth="نوفمبر";
			break;
			case 12:
				$namemonth="ديسمبر";
			break;
		}
		$date = $nameday ." الموافق ".$day ." ".$namemonth." ". $year . " " .  $hours .":". $minute .":". $second . " ". $a ;
		return $date;
	}