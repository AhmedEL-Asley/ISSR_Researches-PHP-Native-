<?php
  date_default_timezone_set("Africa/Cairo");
  $getUser = $con->prepare("SELECT * FROM issr_users WHERE username = ? ");
  $getUser->execute(array($_SESSION['username']));
  $user = $getUser->fetch(); 
  $user_Id = $user['id'];
?>
  <body class="hold-transition skin-blue sidebar-mini" id="body">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>ISSR</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img class="img-circle" src="<?php echo $img.'/Background.png' ?>" alt = ""  style="width:35px;height:35px;"/><b>ISSR Researches</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu" >
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a class="dropdown-toggle" data-toggle="dropdown">
                  <?php
                    if (empty($user['picture'])) {
                      echo '<img class="img-circle" src="'. $img.'/person.png"alt = ""  style="width:35px;height:20px;"/>';
                      } else {
                        echo '<img  class="img-circle" src="uploads/users/' . $user['picture'] . '"alt = "" style="width:35px;height:20px;"/>';
                      }
                  ?>
                  <span class=""><?php echo $user['name'] ?></span>
                </a>
                <ul class="dropdown-menu" >
                  <!-- User image -->
                  <li class="user-header" style="background: url('<?php if (empty($user['background']) ){ echo "$img/Background_users.jpg"; }else{ echo "uploads//Background//" . $user['background']; } ?>') center center;">
                  <?php
                    if (empty($user['picture'])) {
                      echo '<img class="img-circle" src="'. $img.'/person.png" alt = ""  style=""/>';
                      } else {
                        echo '<img  class="img-circle" src="uploads/users/' . $user['picture'] . '"alt = "" style=""/>';
                      }
                  ?>
                  <p><?php echo $user['name']?></p>
                  <p ><?php if ($user['department_type'] == 0 ) { echo "Administrator"; } elseif ($user['department_type']==1){ echo "Doctor" ;} elseif ($user['department_type']==2){ echo "Student" ;} ?></p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left"><a href="users.php?do=Password&id=<?php echo $_SESSION['id'] ?>" class="btn btn-success btn-flat confirm">Change Password <i class="fa fa-lock"></i></a></div>
                    <div class="pull-right"><a href="logout.php" class="btn btn-danger btn-flat confirm">Log Out <i class="fa fa-sign-out"></i></a><div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel" style="background: url('<?php if (empty($user['background']) ){ echo "$img/Background_users.jpg"; }else{ echo "uploads//Background//" . $user['background']; } ?>') center center;">
            <div class="pull-left image" style="margin-bottom:50px;">
              <?php
                    if (empty($user['picture'])) {
                      echo '<img class="img-circle" src="'. $img.'/person.png"alt = ""  style="width:50px;height:50px;"/>';
                      } else {
                        echo '<img  class="img-circle" src="uploads/users/' . $user['picture'] . '"alt = "" style="width:50px;height:50px;"/>';
                      }
                  ?>              
            </div>
            <div class="pull-right info">
              <p><b><?php echo $user['name'] ?></b></p>
              <p class="text-center"><?php if ($user['department_type'] == 0 ) { echo "Administrator"; } elseif ($user['department_type']==1){ echo "Doctor" ;} elseif ($user['department_type']==2){ echo "Student" ;} ?></p>
              <i class="fa fa-circle text-success"></i> Active
              <div class="clock" id="clock"> </div>

            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" >
            <div style="margin:10px;color:#FFF;font-size:22px;">
              <img class="img-circle" src="<?php echo $img.'/Background.png' ?>" alt = ""  style="width:35px;height:35px;"/><b> ISSR Researches</b>
            </div>
            <?php
              menu("active", "dashboard.php", "dashboard", "", "Homepage");
              if ( $user['department_type'] == 0 ) {
                menu("", "departments.php", "tasks", "", "Scientific Departments");
                menu("", "subjects.php", "book", "", "Courses Department");
                menu("", "researches.php", "files-o", "", "Researches List");
                menu("", "users.php?do=All_Students", "user", "", "Students Department");
                menu("", "users.php?do=All_Doctors", "graduation-cap", "", "Doctors Department");
                menu("", "users.php?do=All_Administrators", "user-secret", "", "Administrators Department");
              }
              if ( $user['department_type'] == 1 ) {
                menu("", "subjects.php?do=All_Subject_Doctor", "book", "", "Courses");
                menu("", "researches.php?do=All_Researches_Doctors", "files-o", "", "Researches List");
              }
              if ( $user['department_type'] == 2 ) {
                menu("", "subjects.php?do=All_Subject_Student", "book", "", "Courses");
                menu("", "researches.php?do=Upload_Researches", "upload", "", "Upload Researche");
                menu("", "researches.php?do=All_Researches_Students", "files-o", "", "Researches List");
              }
              menu("", "logout.php", "sign-out", "red", "Sing Out");

            ?>

          </ul>
        </section>
        <!-- /.sidebar -->       
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
