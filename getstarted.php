
<?php
session_start();
include('dbconn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>user login</title>
</head>
<body>
	<div class="align">
		<img class="logo" src="images/logo.svg">
		<div class="card">
			<div class="head">
				<div></div>
				<a id="login" class="selected" href="#login">Login</a>
				<a id="register" href="#register">Register</a>
				<div></div>
			</div>
			<div class="tabs">
                <form method="POST" class="form-style">
					<div class="inputs">
						<div class="input">
							<input placeholder="Username" name="username" type="text">
							<img src="images/user.svg">
						</div>
						<div class="input">
							<input placeholder="Password" name="password" type="password">
							<img src="images/pass.svg">
						</div>
						<label class="checkbox">
							<input type="checkbox">
							<span>Remember me</span>
						</label>
					</div>
					<button type="submit" name="login">Login</button>
				</form>
				<form method="POST" action="getstarted.php#login" class="form-style" >
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
					<button type="submit" name="register">Register</button>
				</form>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/index.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php 

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from registered_users where username ='$username' and password = '$password'";

    $query = mysqli_query($con, $sql) or  die(mysqli_error($con));

    $check_user = mysqli_num_rows($query);

 
      
if($check_user == 0)
{

    echo '
    <script>
        swal({
                title: "Email or Password is Wrong!",
                icon: "error",
             });
</script>
';

    exit();

}
else
    {

        $_SESSION['username'] = $username;

        $get_user = "select * from registered_users where username ='$username'";

        $run_user = mysqli_query($con, $get_user);

        $row = mysqli_fetch_array($run_user);
        
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username']; 
      

        echo '
        <script>
            swal({
                    title: "Login Successful!",
                    icon: "success",
                 });
    </script>
    ';
    
        echo "<script>window.open('auth-selection.php#otpcode', '_self')</script>";  

        }

}


if(isset($_POST['register']))
{

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $check_user = "select user_id from registered_users where email = '$email' ";

    $run_check = mysqli_query ($con, $check_user);

    if (mysqli_num_rows($run_check) == 0)
    {
    $sql = "insert into registered_users (username, email, phone_number, password)
    value ('$username', '$email', '$phone', '$password')
    ";
    $query = mysqli_query($con, $sql) or  die(mysqli_error($con));

    if($query)
    {
        echo '
        <script>
            swal({
                    title: "Registration Successful!",
                    icon: "success",
                 });
    </script>
    ';

    }
}

else{
    echo '
    <script>
        swal({
                title: "Email already registered!",
                icon: "error",
             });
</script>
';

}
}

?>