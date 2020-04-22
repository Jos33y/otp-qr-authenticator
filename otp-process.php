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

$email = $row['email'];

$phone = $row['phone_number'];

$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$to= $email;
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: otp@otp-qr-authenticator" . "\r\n" .
"CC: josephlagbalu@gmail.com";

mail($to,$subject,$txt,$headers);

$_SESSION['user_id']=$user_id;
$_SESSION['email']=$email;
$_SESSION['phone']=$phone;
$_SESSION['otp']=$rndno;

header("location:authenticate.php#otpcode" );

?>