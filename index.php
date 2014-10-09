<!DOCTYPE html>

<html>
<head>
    <title>My Time Management</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="signin.css" />
    <link rel="stylesheet" type="text/css" href="register.css" />
</head>

<body>
    

<?php 
require_once 'openid.php';
$openid = new LightOpenID("ec2-107-22-9-201.compute-1.amazonaws.com");

$openid->identity = 'https://www.google.com/accounts/o8/id';
$openid->required = array(
  'namePerson/first',
  'namePerson/last',
  'contact/email',
);
$openid->returnUrl = 'http://ec2-107-22-9-201.compute-1.amazonaws.com/~GG/final_project/login.php'
?>


<!-- <a class="btn-auth btn-google large" href="<?php echo $openid->authUrl() ?>">
    Sign in with <b>google</b>
</a> -->
<div class="container" style="text-align:center">
	<h1>Welcome to the Time Management System</h1>
      <form class="form-signin">
        <img src="clock.jpg" id="clock">
        <a class="btn btn-danger btn-lg btn-block" href="<?php echo $openid->authUrl() ?>">
			Sign In With <strong>Google</strong>
		</a>
      </form>
 </div>



</body>
</html>
