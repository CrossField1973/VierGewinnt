<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "viergewinnt";
                
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    //Check, if player is in only one instance
    $sql = "SELECT state_of_game, turn, red, yellow FROM games WHERE red = '".$_SERVER['REMOTE_ADDR']."' OR yellow = '".$_SERVER['REMOTE_ADDR']."'";
    $result = $conn->query($sql);

    if ($result->num_rows != 1) 
    {
        //Redirect to lobby, or error message page
        header("Location: http://example.com/error.php");
        die();
    }

    $row = $result->fetch_assoc();

    //Check if Winner is recided
    //Check, if its winner or loser and handle asynchron
    for($c = 0; $c < 21; $c++)
    {
	    if($row["state_of_game"][$c] == 1 && $row["state_of_game"][$c + 7] == 1 && $row["state_of_game"][$c + 14] == 1 && $row["state_of_game"][$c + 21] == 1)
	    {
		    header("Location: http://example.com/error.php");
        	die();
        }
        
        else if($row["state_of_game"][$c] == 2 && $row["state_of_game"][$c + 7] == 2 && $row["state_of_game"][$c + 14] == 2 && $row["state_of_game"][$c + 21] == 2)
	    {
		    header("Location: http://example.com/error.php");
        	die();
	    }
    }

    for($c = 0; $c < 39; $c++)
    {
	    if($row["state_of_game"][$c] == 1 && $row["state_of_game"][$c + 1] == 1 && $row["state_of_game"][$c + 2] == 1 && $row["state_of_game"][$c + 3] == 1)
	    {
		    header("Location: http://example.com/error.php");
        	die();
	    }

	    else if($row["state_of_game"][$c] == 2 && $row["state_of_game"][$c + 1] == 2 && $row["state_of_game"][$c + 2] == 2 && $row["state_of_game"][$c + 3] == 2)
	    {
		    header("Location: http://example.com/error.php");
        	die();
	    }

	    if($c % 7 == 3)
	    {
		    $c += 4;
	    }
    }

    for($c = 0; $c < 18; $c++)
    {
	    if($row["state_of_game"][$c] == 1 && $row["state_of_game"][$c + 8] == 1 && $row["state_of_game"][$c + 16] == 1 && $row["state_of_game"][$c + 24] == 1)
	    {
		    header("Location: http://example.com/error.php");
        	die();
	    }

	    else if($row["state_of_game"][$c] == 2 && [$c + 8] == 2 && $row["state_of_game"][$c + 16] == 2 && $row["state_of_game"][$c + 24] == 2)
	    {
		    header("Location: http://example.com/error.php");
        	die();
	    }

    	if($c % 7 == 3)
	    {
		    $c += 4;
	    }
    }

    for($c = 0; $c < 18; $c++)
    {
	    if($row["state_of_game"][$c + 3] == 1 && $row["state_of_game"][$c + 9] == 1 && $row["state_of_game"][$c + 15] == 1 && $row["state_of_game"][$c + 21] == 1)
	    {
		    header("Location: http://example.com/error.php");
        	die();
	    }

	    else if($row["state_of_game"][$c + 3] == 2 && $row["state_of_game"][$c + 9] == 2 && $row["state_of_game"][$c + 15] == 2 && $row["state_of_game"][$c + 21] == 2)
	    {
		    header("Location: http://example.com/error.php");
        	die();
	    }

	    if($c % 7 == 3)
	    {
		    $c += 4;
	    }
    }    
?>

<html>
    <head>
        <title>Vier-Gewinnt</title>
        <link rel="stylesheet" href="../CSS/game.css">
        <script src="../JS/game.js"></script>
    </head>
    <body style="background-image: url(../IMG/logscreen.jpeg); background-repeat: norepeat">

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
        </ul>

        <div id="web-page" style="display: inline-grid; grid-template-columns: 1fr 1fr">
            <div id="game_area" style="display: inline-grid; grid-template-columns: auto auto auto auto auto auto auto">  
                <?php
                    //Create Game Area
                    for($i = 0; $i < 6; $i++)
                    {
                        for($j = 0; $j < 7; $j++)
                        {   
                            echo "<div id= '$j/$i'><img src= '";
                            if($row["state_of_game"][$i * 7 + $j] == 0)
                            {
                                echo "../IMG/panel.png'";
                            }

                            else if($row["state_of_game"][$i * 7 + $j] == 1)
                            {
                                echo "../IMG/panel_yellow.png'";
                            }

                            else if($row["state_of_game"][$i * 7 + $j] == 2)
                            {
                                echo "../IMG/panel_red.png'";
                            }
                            echo " style='max-width: 100%; max-height: 100%;' onclick='javascript:register_turn($j)'></div>";
                        }
                    }
                ?>              
            </div>
            <div id="game_ui" style="display: grid">
                <?php
                    if($_SERVER['REMOTE_ADDR'] == $row["turn"])
                    {
                        echo "<h1>It's your turn</h1>";
                    }

                    else
                    {
                        echo "<h1>Waiting for opponent's turn</h1>";
                    }
                ?>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                <input type="button" value="Update Page" onclick="javascript:update_page()">
            </div>
        </div>
        <?php
            if($_SERVER['REMOTE_ADDR'] == $row["turn"])
            {
                if(isset($_GET['turn']))
                {
                    $i = $_GET['turn'];

                    //Set i to lowest of row
                    $i = $i + 35;

                    while($i >= 0)
                    {
                        if($row["state_of_game"][$i] == 0)
                        {
                            if($_SERVER['REMOTE_ADDR'] == $row["red"])
                            {
                                $row["state_of_game"][$i] = 1;
                                if($row["turn"] == $row["red"])
                                $sql = "UPDATE games SET state_of_game = '".$row["state_of_game"]."', turn = '".$row["yellow"]."' WHERE red = '".$_SERVER['REMOTE_ADDR']."' OR yellow = '".$_SERVER['REMOTE_ADDR']."'"; 
                            }

                            else
                            {
                                $row["state_of_game"][$i] = 2;
                                $sql = "UPDATE games SET state_of_game = '".$row["state_of_game"]."', turn = '".$row["red"]."' WHERE red = '".$_SERVER['REMOTE_ADDR']."' OR yellow = '".$_SERVER['REMOTE_ADDR']."'"; 
                            }

                            $conn->query($sql);
                            break;
                        }

                        $i = $i - 7;
                    }
                    
                    if($i < 0)
                    {
                        echo "<h1>ungültiger zug</h1>";
                    }
                }
            }
        ?>

        <script type="text/javascript">
            //setInterval(update_page(), 3000);
        </script>
    </body>

    
</html>

