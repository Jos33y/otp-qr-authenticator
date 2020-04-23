<?php
session_start();

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];  
$email = $_SESSION['email'];

$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$to=$email;
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: otp@studentstutorial.com";

if(mail($to,$subject,$txt,$headers))
{

$_SESSION['user_id']=$user_id;
$_SESSION['otp']=$rndno;

echo "<script>window.open('authenticate.php#otpcode', '_self')</script>"; 

} ?>
