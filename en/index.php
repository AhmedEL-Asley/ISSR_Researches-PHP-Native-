
<?php 
session_start();
$noNavbar = '';
$pageTitle = 'Login' ;
$error = "";
if (isset($_SESSION['username'])) {
	header('Location: dashboard.php');   // Redirect To Dashboard Page
	}
    include 'init.php';
// Check If User Coming From HTTP POST Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username 	= filter_var($_POST['user'],FILTER_SANITIZE_STRING);
	$password 	= filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
	$hashedpass	= sha1($password);

	//Check If The User Exist In Database
	$user = getOne("*", "issr_users", "", "WHERE issr_users.username = ?", "", "$username");
	if (!empty($user)) {
		$stmt = $con->prepare("SELECT 
									 *
								FROM
									issr_users
								WHERE 
									( username = ? )
								AND
									password = ?
								AND
									department_type = ?
								AND
									admin = 1
								LIMIT 1");
		$stmt->execute(array($username, $hashedpass, $user['department_type']));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();
		//If Count > 0 This Mean The Database Contain Record About This Username
		if ($count > 0){
			$_SESSION['username'] 			= $username;  // Register Session Name
			$_SESSION['department_type'] 	= $user['department_type'];  // Register Session Phone
			$_SESSION['id'] 				= $row['id'];  // Register Session ID
			$_SESSION['department'] 		= $row['department'];  // Register Session ID
			header('Location: dashboard.php');   // Redirect To Dashboard Page
			exit();
		} else {
			$error = "<div class='alert alert-danger text-center' style='font-size:15px'>Invalid Username OR Password ?!....</div>";	
		}

	} elseif (empty($user)) {
		$error = "<div class='alert alert-danger text-center' style='font-size:15px'>Invalid Username OR Password ?!....</div>";
	}


}
?>
<body class="hold-transition login-page " style="background: url('<?php echo $img ;?>/Background.png') center center;">
	<div class="login-box">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Please Log In</h3>
			</div>
			<div class="panel-body ">
				<form  method='POST' action="<?php echo $_SERVER['PHP_SELF'] ?>" name="loginForm" onsubmit = "return validation()">
				<div id="error_message"><?php echo $error; ?></div>

					<?php
						input("col-md-12", "user", "text", "user", '" id="user"',"", "", "Username, Email, or ID", "required", "off", "");
						input("col-md-12", "lock", "password", "pass", 'password" id="pass"',"", "", "Password", "required", "new-password", "");
					?>
					<!-- Change this to a button or input when using this as a form -->
					<input class="btn btn-primary btn-block" type="submit" name="Login" value="Login">
				</form>
			</div>
		</div>
	</div><!-- /.login-box -->
    <!-- validation for empty field   -->
    <script>  
            function validation()  
            {  
                var id=document.loginForm.user.value;  
                var ps=document.loginForm.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script> 
</body>

