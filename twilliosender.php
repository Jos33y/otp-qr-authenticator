<?php
session_start();
include('dbconn.php');
require __DIR__ . '\vendor\twilio\sdk\src\Twilio\autoload.php';
use Twilio\Rest\Client;


$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];  
$phone = $_SESSION['phone'];



$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);

$txt = "OTP: ".$rndno."";

$number  = '+234'.$phone;

$sid = 'AUTH ID';
$token = 'AUTH TOKEN';
$client = new Client($sid, $token);

 //Use the client to do fun stuff like send text messages!
 $send = $client->messages->create(
    //the number you'd like to send the message to
        $number,
        array(
        //A Twilio phone number you purchased at twilio.com/console
            'from' => '+18135678875',
            'body' => $txt
        )
    ); 

    if($send)
      {
        $_SESSION['user_id']=$user_id;
        $_SESSION['otp']=$rndno;
        $_SESSION['box'] = 'phone';
        
        echo "<script>window.open('authenticate.php#otpcode', '_self')</script>"; 
    }
?>
