<?php
        
        $token = $_COOKIE["token"];

        $sqlhost = "localhost";
        $sqluser = "root";
        $sqlpass = "";
        $dbname  = "user_table";

        $my_db = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die ("DB-system nicht verfuegbar");

        if (mysqli_connect_error()) {
          die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {

          $READ = "SELECT * FROM user_table WHERE securitytoken='".$token."'";
          $result = mysqli_query($my_db, $READ);
          
          $row = $result->fetch_assoc();
          
        
        }




?>


<html>

<head>
  <title>Settings</title>
  <link rel="stylesheet" href="../CSS/register.css">
</head>

<body>
  <form action="../PHP/updatesettings.php" method="post">
    <div class="register-box">
      <h1>Settings</h1>
      
      <?php echo "<div class='textbox'>
        <input type='email' placeholder='Email' name='email' value='".$row['email']."' required readonly>
        </div>"
      ?>
    
      <div class="textbox">
        <input type="password" placeholder="Password *" name="pw" value="" required>
      </div>
      
      <?php echo  "<div class='textbox'>
        <input type='text' placeholder='Nickname' name='nickname' value=".$row['nickname']." required readonly>
      </div>"
      ?>

      <?php echo  "<div class='textbox'>
        <input type='text' placeholder='Firstname' name='fname' value='".$row['first_name']."'>
      </div>
      <div class='textbox'>
        <input type='text' placeholder='Name' name='name' value=".$row['name'].">
      </div>"
      ?>
      
      <?php echo  "<div class='textbox'>
        <input type='number' placeholder='Age' name='age' value=".$row['age']." min='18' max='100'>
      </div>"
      ?>

      <div>
        <label class="container">No information
          <input type="radio" checked="checked" name="radio" value="def">
          <span class="checkmark"></span>
        </label>
        <label class="container">Male
          <input type="radio" name="radio" value="male">
          <span class="checkmark"></span>
        </label>
        <label class="container">Female
          <input type="radio" name="radio" value="female">
          <span class="checkmark"></span>
        </label>
      </div>
      <input class="btn" type="submit" name="submit" value="Update">
  </form>
  <a href="../PHP/lobby.php">
    <input class="btn" type="button" name="" value="Back">
  </a>
  </div>
</body>

</html>
