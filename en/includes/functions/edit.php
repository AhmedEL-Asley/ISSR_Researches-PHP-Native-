<?php
	/*
		====== This function expresses the Edit Data
		====== Name of the function
		====== edit(condition, case, name, action, table)
	*/
	function edit($condition, $case, $name, $action, $table) {
		global $con;
		$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
		$stmt = $con->prepare("SELECT * FROM $table WHERE id = ? LIMIT 1");
		$stmt->execute(array($id));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();
		if ($count > 0) { 
			getHeader($name);
	?>
			<section class="content">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title page-header text-center"><?php echo $name; ?> </h3>
							</div>
							<div class="panel-body ">
								<form class="form-horizontal box-body" action="<?php echo $action ?>" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?php echo $id ?>" >
									<div class="content">
										<div class="row">
										<?php
											if ($condition == "persons") {
												if ($case == "users") {
													formEdit("persons", "users", $row);
												} elseif ($case == "doctors") {
												} elseif ($case == "students") {
												} elseif ($case == "password") {
													echo '<input type="hidden" name="password" value="' . $row['password'] . '" > ';
													formAdd("password", "");
												}
											} elseif ($condition == "subjects") {
												if ($case == "edit_subject") {
													formEdit("subjects", "edit_subject", $row);
												} elseif ($case == "edit_department") {
													formEdit("subjects", "edit_department", $row);

												}

											}
											user("Edit");
										?>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
	
	<?php
		}
		$con = null;
	}
