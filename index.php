<?php
mysql_query("DELETE FROM `pw_reset` WHERE `date` NOT LIKE CURDATE()");
if(isset($_POST['field'])) {
if(isset($_POST['method'])) {
$field = $_POST['field'];
$method = $_POST['method'];
if($method == 'reset') {
if(emailExist($field) == '1') {
$pid = getUid($field);
$verify = md5(rand(1,999999));
mysql_query("INSERT INTO `pw_reset` (`email`, `verification`, `date`) VALUES ('$email', '$verify', CURDATE());");
$body = "Your verification code is $verify. It expires one day after requesting it. Please enter your verification code at http://stackup.sg/pwreset.php?e=a to reset your password. If you did not request a password, please ignore this email, as it will expire tomorrow.";
$to = $field;
$subject = "StackUp Portfolio Password Reset Request";
$headers = "From: noreply@stackup.sg\r\n" .
     "X-Mailer: php";
if (mail($to, $subject, $body, $headers)) {
header('Location: /index.php?e=se');
exit();
}
} else {
header('Location: /index.php?e=e');
exit();
}
} elseif($method == 'validate') {
if(strlen($_POST['pw']) >= '1') {
$pw = $_POST['pw'];
$valid = $field;
if(resetCheck($valid) == 'x') {
$dummyvar = '1';
} else {
$uid = resetCheck($valid);
mysql_query("DELETE FROM `pw_reset` WHERE `uid` = '$uid'");
changePw($uid, $pw);
header('Location: index.php?f=l&m=sc');
exit();
}
}
}
}
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>StackUp Portfolios</title>
      <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="container">
	<h1 style="text-align: center; margin: 50px;">StackUp Portfolios</h1>
	<section id="content">
		<form method="post" id="loginform">
			<h1>Login</h1>
			<div>
				<input name="email" type="text" placeholder="Email Address" required="" id="username" />
			</div>
			<div>
				<input name="password" type="password" placeholder="Password" required="" id="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="#" onclick="showPwreset();">Lost your password?</a>
				<a href="#" onclick="showRegister();">Register</a>
			</div>
		</form>
		<form method="post" id="registerform" style="display: none;">
			<h1>Register</h1>
			<div>
				<input name="email" type="text" placeholder="Email Address" required="" id="username" />
			</div>
			<div>
				<input name="password" type="password" placeholder="Password" required="" id="password" />
			</div>
			<div>
				<input name="code" type="text" placeholder="Invite Code" required="" id="invitecode" style="background: none;" />
			</div>
			<div>
				<input type="submit" value="Register" />
				<a href="#" onclick="showPwreset();">Lost your password?</a>
				<a href="#" onclick="showLogin();">Login</a>
			</div>
		</form>
		<form method="post" id="pwresetform" style="display: none;">
			<h1>Recovery</h1>
			<div>
				<input name="email" type="text" placeholder="Email Address" required="" id="username" />
			</div>
			<div>
				<input type="submit" value="Reset" />
				<a href="#" onclick="showLogin();">Login</a>
				<a href="#" onclick="showRegister();">Register</a>
			</div>
		</form>
		<div class="button">
			<a href="directory.php">View our talent directory</a>
		</div>
	</section>
</div> 
    <script src="js/index.js"></script>
</body>
</html>
