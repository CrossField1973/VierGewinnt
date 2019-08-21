<?php
require "db_connection.php";
$token = $_COOKIE["token"];

$email = filter_input(INPUT_POST, 'email');
$nickname = filter_input(INPUT_POST, 'nickname');
$fname = filter_input(INPUT_POST, 'fname');
$name = filter_input(INPUT_POST, 'name');
$age = filter_input(INPUT_POST, 'age');
$gender = filter_input(INPUT_POST, 'radio');

function random_string() {
    if(function_exists('random_bytes')) {
       $bytes = random_bytes(16);
       $str = bin2hex($bytes); 
    } else if(function_exists('openssl_random_pseudo_bytes')) {
       $bytes = openssl_random_pseudo_bytes(16);
       $str = bin2hex($bytes); 
    } else if(function_exists('mcrypt_create_iv')) {
       $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
       $str = bin2hex($bytes); 
    } else {
       $str = md5(uniqid('viergewinntgewinntwenn4', true));
    }   
    return $str;
 }
      

$token = $_COOKIE["token"];
$READ = "SELECT name FROM user_table WHERE securitytoken='".$token."'";
$result = mysqli_query($conn, $READ);

$row = $result->fetch_assoc();
$ID = $row['ID'];  

$securitytoken = random_string();
$identifier = random_string();

$UPDATE = "UPDATE user_table SET, name = '".$name."', first_name = '".$fname."', age = ".$age." WHERE securitytoken='".$token."'";

mysqli_query($conn, $UPDATE);

header("Location: ../PHP/lobby.php");
?>  

