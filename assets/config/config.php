<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'task');
define('DB_USER', 'root');
define('DB_PASS', '');
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS);
if (!$con){
    echo "Error connecting to database";
}else{
    mysqli_select_db($con, DB_NAME);
}
if(phpversion() < 8.0){
    exit('PHP Version 8 Required');
}
?>