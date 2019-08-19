<?php
require "db_connection";

if ((isset($_GET['email'])) && (isset($_GET['pw']))) {
  
  $safe_email = mysqli_real_escape_string($conn, $_GET['email']);
  $sql = "SELECT * FROM user_table WHERE email = '" . $safe_email . "';";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  
  if ($dbdata = mysqli_fetch_assoc($res)) {
  
    if (password_verify($_GET['pw'], $dbdata['password'])) {
      
      
          $READ = "SELECT securitytoken FROM user_table WHERE email='".$safe_email."'";
          $result = mysqli_query($conn, $READ);
          
          $row = $result->fetch_assoc();
          $token = $row['securitytoken'];
        
          setcookie("token", $token, time() + (86400 * 30), "/");

          $message = "Signed In";
          echo "<script type='text/javascript'>alert('$message');</script>";
          header("Location: ../PHP/lobby.php");

        } else {

          $message = "Wrong Email or Password";
          echo "<script type='text/javascript'>alert('$message');</script>";
          header("Location: ../HTML/login.html");

        }

    } else{
      
      $message = "Wrong Email or Password";
      echo "<script type='text/javascript'>alert('$message');</script>";
      header("Location: ../HTML/login.html");
    
    }
  }

?>
