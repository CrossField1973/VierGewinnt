<?php
    require "db_connection.php";
    require "check_logged_in.php";

    $sql = "SELECT state_of_game, turn, player1, player2 FROM games WHERE player1 = '".$token."' OR player2 = '".$token."'";
    $result = $conn->query($sql);

    if($result->num_rows != 1)
    {
        header("Location: lobby.php");
        die();
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
        </ul>

        <div id="web-page" style="display: inline-grid; grid-template-columns: 1fr 1fr">        
            <!--Create Game Area-->  
            <div id='game_area' style='display: inline-grid; grid-template-columns: auto auto auto auto auto auto auto'>
            </div>
            <div id="game_ui" style="display: grid">
                <div id="current_turn">
                </div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
        </div>

        <script type="text/javascript">
            load_game_area();
            check_for_winner();
            setInterval(interval, 1000);
        </script> 
    </body>
</html>
