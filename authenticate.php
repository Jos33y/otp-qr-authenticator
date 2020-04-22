<?php
session_start();
include('dbconn.php');


if(!isset($_SESSION['user_id']))
{
    header('location:getstarted.php#login');
}

?>
<?php 

$user_id = $_SESSION['user_id'];

$get_user = "select * from registered_users where user_id ='$user_id'";

$run_user = mysqli_query($con, $get_user);

$row = mysqli_fetch_array($run_user);

$username = $row['username'];

if(isset($_POST['verify']))
{

$rno=$_SESSION['otp'];

$urno=$_POST['otpvalue'];

if(!strcmp($rno,$urno))
{
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];

echo "<script>alert('Valid OTP')</script>";





}
else{
    echo "<script>alert('Invalid OTP')</script>";

}

}

?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>user authentication</title>
</head>
<body>
	<div class="align">
		<h3><span class="green"> user</span><span class="grey">authentication </span></h3>
		<div class="card">
			<div class="head">
				<div></div>
				<a id="otpcode" class="selected" href="#otpcode">OTP Auth</a>
				<a id="qrcode" href="#qrcode">QR Code Auth</a>
				<div></div>
			</div>
			<div class="tabs">
				<form method="POST">
					<div class="text">
                        <h2 class="user">Welcome <span class="username"><?php echo $username; ?> </span> </h2>
                        <h4 class="otp-sent"> OTP has been sent to your mail </h4>
                        
						<div class="input">
							<input placeholder="Enter OTP Code" type="text" name="otpvalue">
							<img src="images/pass.svg">
						</div>
                        
                    </div>
					<button type="submit" name="verify">Verify</button>
				</form>
				<form>
					<div class="inputs">
						<div class="input">
							<input placeholder="Username" type="text" name="username">
							<img src="images/user.svg">
						</div>
						<div class="input">
							<input placeholder="Email" type="text" name="email">
							<img src="images/mail.svg">
						</div>
						<div class="input">
							<input placeholder="Phone Number" type="text" name="phone">
							<img src="images/call.svg">
						</div>
						<div class="input">
							<input placeholder="Password" type="password" name="password">
							<img src="images/pass.svg">
						</div>
					</div>
					<button>Register</button>
				</form>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/index-2.js"></script>
</body>
</html>
