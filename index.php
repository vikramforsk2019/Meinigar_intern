<?php include 'con.php';?>
<?php
  session_start();

if (isset($_SESSION['room']))
 {
        /// your code here
header("Location:profile.php");

exit();
    }
else

{
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Registration and login form</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Validate Login & Register Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
<link rel="shortcut icon" type="image/x-icon"  href="admin/img/house.png">
 
	<!-- css files -->
	<link rel="stylesheet" href="form/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="form/css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Magra:400,700&amp;subset=latin-ext" rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<!-- title -->
	<h1>
		Validate Login & Register Forms
	</h1>
	<!-- //title -->

	<!-- content -->
	<div class="container-agille">
		<div class="formBox level-login">
			<div class="box boxShaddow"></div>
			<div class="box loginBox">
				<h3>Login Here</h3>
				<form class="form" action="logincheck.php" method="post">
					<div class="f_row-2">
						<input type="text" class="input-field" placeholder="Email" name="email" required>
					</div>
					<div class="f_row-2 last">
						<input type="password" name="password" placeholder="Password" class="input-field" required>
					</div>
					<input class="submit-w3" type="submit" value="Login">
					<div class="f_link">
						<a href="" class="resetTag">Forgot your password?</a>
					</div>
				</form>
			</div>
			<div class="box forgetbox agile">
				<a href="#" class="back icon-back">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 199.404 199.404" style="enable-background:new 0 0 199.404 199.404;" xml:space="preserve">
						<polygon points="199.404,81.529 74.742,81.529 127.987,28.285 99.701,0 0,99.702 99.701,199.404 127.987,171.119 74.742,117.876 
			  199.404,117.876 " />
					</svg>
				</a>
				<h3>Reset Password</h3>
				<form class="form" action="passrecovermail.php" method="post" name="p1">
					<p>we get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password</p>
					<div class="f_row last">
						<label>Email Id</label>
						<input type="email" name="verify" placeholder="Email" class="input-field" >
						<u></u>
					</div>
					<button class="btn button submit-w3" form="p1" value="submit">
						<span>Reset</span>
					</button>
				</form>
			</div>
			<div class="box registerBox wthree">
				<span class="reg_bg"></span>
				<h3>Register</h3>
				<form class="form" action="register.php" method="post" >
					<div class="f_row-2">
						<input type="text" class="input-field" placeholder="fistname" name="fname" required>
					</div>
<div class="f_row-2">
						<input type="text" class="input-field" placeholder="lastname" name="lname" required>
					</div>
					<div class="f_row-2 last">
						<input type="text" name="email" placeholder="Enter Valid Email" id="password1" class="input-field" required>
					</div>
					<div class="f_row-2 last">
						<input type="password" name="pass" placeholder="Confirm Password" id="password2" class="input-field" required>
					</div>
					<input class="submit-w3" type="submit" value="Register">
				</form>
			</div>
			<a href="#" class="regTag icon-add">
				<i class="fa fa-repeat" aria-hidden="true"></i>

			</a>
		</div>
	</div>
	<!-- //content -->

	<!-- copyright -->
	<div class="footer-w3ls">
		<h2>&copy; Design by Vikram
			
		</h2>
	</div>
	<!-- //copyright -->


	<!-- js files -->
	<!-- Jquery -->
	<script src="form/js/jquery-2.2.3.min.js"></script>
	<!-- //Jquery -->
	<!-- input fields js -->
	<script src="form/js/input-field.js"></script>
	<!-- //input fields js -->

	<!-- password-script -->

	<div id="loader-wrapper">
        <div id="preloader_1">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
              </div>
      </div>
   <script type="text/javascript" src="vendor/theme.js"></script>
  
</body>
</html>
<?
}
?>
