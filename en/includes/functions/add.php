<?php
	/*
		====== This function expresses the Add data
		====== Name of the function
		====== add(condition, case, name, action)
	*/
	function add($condition, $case, $name, $action) {
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
								<div class="content">
									<div class="row">
									<?php
										if ($condition == "persons") {
											if ($case == "users") {
												formAdd("persons", "users");
											} elseif ($case == "doctors") {
												formAdd("persons", "doctors");
											} elseif ($case == "students") {
												formAdd("persons", "students");
											}
										} elseif ($condition == "subjects") {
											if ($case == "add_department") {
												formAdd("subjects", "add_department");

											} elseif ($case == "add_subject") {
												formAdd("subjects", "add_subject");

											} elseif ($case == "add_subject_doctor") {
												formAdd("subjects", "add_subject_doctor");
											} elseif ($case == "add_subject_student") {
												formAdd("subjects", "add_subject_student");
												
											} elseif ($case == "upload_researches") {
												formAdd("subjects", "upload_researches");
											}

										}
										user("Add");
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
