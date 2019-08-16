<?php  
  if(isset($_COOKIE["token"])
  {
    $token = $_COOKIE["token"];
  }

  $sqlhost = "localhost";
	$sqluser = "root";
	$sqlpass = "";
	$dbname  = "viergewinnt";

	$my_db = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die ("DB-system nicht verfuegbar");

	if (mysqli_connect_error()) {
		die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}

	//Check, if user is logged in
	$sql = "SELECT securitytoken FROM user_table";
	$result = $my_db->query($sql);
	$is_logged_in = false;

	if($result->num_rows > 0)
	{
		if(isset($_COOKIE["token"]))
		{
			for($i = 0; $i < $result->num_rows; $i++)
			{
				$row = $result->fetch_assoc();
				if($row["securitytoken"] == $_COOKIE["token"])
				{
					$is_logged_in = true;
					$token = $_COOKIE["token"];
				}
			}
		}
	}

	if($is_logged_in == false)
	{
		header("Location: http://example.com/error.php");
    die();
	}

  $READ = "SELECT * FROM user_table WHERE securitytoken='".$token."'";
  $result = mysqli_query($my_db, $READ);
  
  $row = $result->fetch_assoc();
  

}




?>


<html>

<head>
  <title>Settings</title>
  <link rel="stylesheet" href="../CSS/settings.css">
</head>

<body>

  	<!--Navigation Bar-->
    <ul class="dashboard">
			<li class="logo" style="display: inline">
        <a href="http://192.168.92.106/VierGewinnt-Login/PHP/lobby.php">
          <img src="../IMG/4gewinnt_logo.png" style="height: 100%; width: auto">
        </a>
      </li>
			<li style="display: inline">
        <a href="../HTML/login.html">
          <button type="button" class="logoutbtn" onclick="logout()">
            Logout
          </button>
        </a>
      </li>
  </ul>

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
