<?php
	require "db_connection.php";
	require "check_logged_in.php";
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
				<a href="lobby.php">
					<img src="../IMG/4gewinnt_logo.png" style="height: 100%; width: auto">
				</a>
			</li>
			<li style="display: inline">
				<a href="../PHP/login.php">
					<button type="button" class="logoutbtn" onclick="logout()">
						Logout
					</button>
				</a>
			</li>
			<li style="display: inline">
				<a href="settings.php">
					<button type="button" class="sbtn">
						Settings
					</button>
				</a>
			</li>
			<?php
				$sql = "SELECT player1 FROM games WHERE player1 = '".$token."' OR player2 = '".$token."'";
				$result = $conn->query($sql);
				if($result->num_rows != 0)
				{
					echo "<li style='display: inline'><a href='game.php'><button type='button' class='logoutbtn'>Continue Game</button></a></li>";
				}
			?>
		</ul>
	
		<!--Main Area-->
		<div class="lobby-box">
			<h1 class="titel">Lobby</h1>
			<div class="welbox">
				Welcome back 

				<?php
					$READ = "SELECT nickname FROM user_table WHERE securitytoken='".$token."'";
					$result = mysqli_query($conn, $READ);
					$row = $result->fetch_assoc();
					echo $row['nickname'];
				?>
			</div>

			<div>

				<!--List of joinable Games-->
				<div id="open_games">	
					<script type="text/javascript">
						display_open_games();
						setInterval(display_open_games, 500);
					</script>
				</div>		

				<!--Open new Game Button-->
				<div class="gameadd" id="add">	
					<button type="button" class="addbtn" onclick="create_new_game()">+</button>			
				</div>
			</div>

			<div id="error_messages">
			</div>
		</div>
	</body>
</html>
