<?php

include('dbconn.php');

$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);

$txt = "OTP: ".$rndno."";

$get_user = "select * from registered_users where user_id ='2'";

$run_user = mysqli_query($con, $get_user);

$row = mysqli_fetch_array($run_user);

$username = $row['username'];

$phone = $row['phonenumber'];


?>