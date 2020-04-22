
<?php

session_start();

session_destroy();

header('location:getstarted.php#login');

?>