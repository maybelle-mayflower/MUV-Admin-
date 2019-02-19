<?php
session_start();
include './assets/config/config.php';
include './assets/config/functions.php';

?>

<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Administrator | Login</title>
		<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/muvicon.JPG">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            .header_login_rgt ul li {
    float: left;
    list-style: none;
    padding: 0 12px;
    position: relative;
    
}
        </style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
                                                            <div class="logo text-center"><img src="assets/img/logo-dark2.jpg" alt="MUV Logo" style="height:40px; width:150px;"></div>
								<p class="lead">Login to your account</p>
							</div>
                                                    <form class="form-auth-small" action="login.php" method="post">
								<div class="form-group">
									<label for="email" class="control-label sr-only">Email</label>
                                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="true">
								</div>
								<div class="form-group">
									<label for="password" class="control-label sr-only">Password</label>
                                                                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" required="true">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
                                                        <div class="hidden" id="divCheckPassword">
                                                            <pred style="color: red;">* Email or Password does not exist</p>
                                                        </div>
                                                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="login" name="login">LOGIN</button>
								<div class="bottom">
									<!--<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>-->
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
						<h1 class="heading">MUVNG Admin Portal</h1>
							<div class="header_login_rgt">
                                                        <ul>
                                                            <li><a href="http://app.muv.com.ng/" title="Main website"><i class="icon-reply"></i><span style="color: white;">Main website</span></a></li>
                                                            <li>|</li>
                                                            <li><a href="http://app.muv.com.ng/#contact-us" title="Contact admin"><i class="icon-user"></i><span style="color: white;">Contact admin</span></a></li>                                                
                                                        </ul>
                                                    </div> 
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
</body>

</html>
<?php
global $connect;
if(isset($_POST['login']))
    {
        $user_email = $_POST["email"];
        $user_pass = $_POST["password"];
        $hashedpass = "SELECT uPass from tbl_admin WHERE uEmail = '$user_email' AND isActive = 'a'";
        
        $result = mysqli_query($connect, $hashedpass);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        
        if($count == 1 && $user_pass==$row['uPass'])
        {
            $_SESSION['uEmail']=$user_email;
            echo"<script>window.open('index.php','_self')</script>";  
        }
        else
        {
           echo "<script>document.getElementById('divCheckPassword').classList.remove('hidden');</script>"; 
        }
}
?>
