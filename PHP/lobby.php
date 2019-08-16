<?php
	if(isset($_COOKIE["token"]))
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
				}
			}
		}
	}

	if($is_logged_in == false)
	{
		header("Location: http://example.com/error.php");
        die();
	}
?>

<html>
	<head>
		<title>Lobby</title>
		<link rel="stylesheet" href="../CSS/lobby.css">
		<script src="../JS/lobby.js"></script>
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
			<li style="display: inline">
				<a href="../PHP/settings.php">
					<button type="button" class="sbtn">
						Settings
					</button>
				</a>
			</li>
			<li style="display: inline">
				<a href="game.php">
					<button type="button" class="logoutbtn">
						Continue Game
					</button>
				</a>
			</li>
		</ul>
	
		<!--Main Area-->
		<div class="lobby-box">
			<h1 class="titel">Lobby</h1>
			<div class="welbox">
				Welcome back 

				<?php
					$READ = "SELECT nickname FROM user_table WHERE securitytoken='".$token."'";
					$result = mysqli_query($my_db, $READ);
					$row = $result->fetch_assoc();
					echo $row['nickname'];
				?>
			</div>

			<div>
				<!--List of joinable Games-->
				<?php
					$sql = "SELECT red FROM games";
					$result = $my_db->query($sql);
				
					if ($result->num_rows > 0) 
					{
						for($i = 1; $i <= $result->num_rows; $i++)
						{
							$row = $result->fetch_assoc();
							echo "<div class='game1'><div class='gameid'>Game ".$i."</div><button type='button' class='joinbtn'>JOIN</button><div class='creator'>Erstellt von ".$row["red"]."</div></div>";
						}
					}
				?>				

				<!--Open new Game Button-->
				<div class="gameadd" id="add">	
					<button type="button" class="addbtn"><a href="lobby.php?add=true">+</a></button>			
					<!--<button type="button" class="addbtn" onclick="addAChild()">+</button>-->
				</div>
			</div>
		</div>

		<!--Functionality of the Add Button-->
		<?php
			if(isset($_GET["add"]))
			{
				//Check if user has an open game
				$sql = "SELECT red FROM games WHERE red = '".$_SERVER['REMOTE_ADDR']."' OR yellow = '".$_SERVER['REMOTE_ADDR']."'";
				$result = $my_db->query($sql);

				if ($result->num_rows == 1) 
				{
					echo "You are already part of a game_session";
				} 

				else if($result->num_rows == 0)
				{
					echo "here";
					$sql = "INSERT INTO games (red, turn, state_of_game) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$_SERVER['REMOTE_ADDR']."', '000000000000000000000000000000000000000000')";
					$my_db->query($sql);
					header('Location: '.$_SERVER['REQUEST_URI']);
				}
			}
		?>
	</body>
</html>
