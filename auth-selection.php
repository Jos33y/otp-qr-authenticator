
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

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
	
    <title>user authentication</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
                        <h2 class="user">Hi <span class="username"><?php echo $username; ?> </span> </h2>
                         <h4 class="otp-select">Select OTP authentication method </h4>
					</div>
                    <div class="select-otp">
                      <p class="otp-text">Send OTP code to your registered phone number.</p>
                      <button class="btn btn-sm btn-success" name="phone-otp">send otp</button>
                       <p  class="otp-text">Send OTP to your registered email address.</p>
                       <button class="btn btn-sm btn-primary" name="email-otp">send otp</button>
                    </div>                           
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php 

if(isset($_POST['phone-otp']))
{


        $get_user = "select * from registered_users where user_id ='$user_id'";

        $run_user = mysqli_query($con, $get_user);

        $row = mysqli_fetch_array($run_user);
        
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['phone'] = $row['phone_number']; 

        echo '
        <script>
            swal({
                    title: "OTP Sent to Phone!",
                    icon: "success",
                 });
    </script>
    ';
    
        echo "<script>window.open('twilliosender.php', '_self')</script>";  



}

if(isset($_POST['email-otp']))
{

    $get_user = "select * from registered_users where user_id ='$user_id'";

    $run_user = mysqli_query($con, $get_user);

    $row = mysqli_fetch_array($run_user);
    
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];  
    $_SESSION['email'] = $row['email'];

    echo '
    <script>
        swal({
                title: "OTP Sent to Email!",
                icon: "success",
             });
</script>
';

    echo "<script>window.open('otp-process.php', '_self')</script>";  


}

?>
