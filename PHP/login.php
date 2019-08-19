<?php
$sqlhost = "localhost";
$sqluser = "root";
$sqlpass = "";
$dbname  = "viegewinnt";

$my_db = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die("DB-system nicht verfuegbar");

if ((isset($_GET['email'])) && (isset($_GET['pw']))) {
  
  $safe_email = mysqli_real_escape_string($my_db, $_GET['email']);
  $sql = "SELECT * FROM user_table WHERE email = '" . $safe_email . "';";
  $res = mysqli_query($my_db, $sql) or die(mysqli_error($my_db));
  
  if ($dbdata = mysqli_fetch_assoc($res)) {
  
    if (password_verify($_GET['pw'], $dbdata['password'])) {
      
      
          $READ = "SELECT securitytoken FROM user_table WHERE email='".$safe_email."'";
          $result = mysqli_query($my_db, $READ);
          
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
