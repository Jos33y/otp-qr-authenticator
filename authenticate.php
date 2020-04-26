
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

$box = $_SESSION['box'];

$get_user = "select * from registered_users where user_id ='$user_id'";

$run_user = mysqli_query($con, $get_user);

$row = mysqli_fetch_array($run_user);

$username = $row['username'];

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
				
				<div></div>
			</div>
			<div class="tabs">
				<form method="POST" class="form-style">
					<div class="text">
                        <h2 class="user">Welcome <span class="username"><?php echo $username; ?> </span> </h2>
                        <h4 class="otp-sent"> Enter OTP code sent to your <?php echo $box; ?> </h4>
                        
						<div class="input">
							<input placeholder="Enter OTP Code" type="text" name="otpvalue">
							<img src="images/pass.svg">
						</div>
                        
                    </div>
					<button type="submit" name="verify">Verify</button>
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

if(isset($_POST['verify']))
{

$rno=$_SESSION['otp'];

$urno=$_POST['otpvalue'];

if(!strcmp($rno,$urno))
{
    $_SESSION['user_id']=$user_id;

    echo '
    <script>
        swal({
                title: "OTP is Valid!",
                icon: "success",
            });
    </script>
    ';

        echo "<script>window.open('account.php', '_self')</script>";  

}
else{
    echo '
    <script>
        swal({
                title: "Invalid OTP!",
                icon: "error",
             });
</script>
';

}

}

?>
