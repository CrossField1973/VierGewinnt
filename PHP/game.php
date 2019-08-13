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

    //Check, if player is in instance
    $sql = "SELECT state_of_game, turn, red, yellow FROM games WHERE red = '".$_SERVER['REMOTE_ADDR']."' OR yellow = '".$_SERVER['REMOTE_ADDR']."'";
    $result = $conn->query($sql);

    if ($result->num_rows != 1) 
    {
        header("Location: http://example.com/error.php");
        die();
    }

    $row = $result->fetch_assoc();

    
?>

<html>
    <head>
        <title>Vier-Gewinnt</title>
        <script src="../JS/game.js"></script>
    </head>
    <body>
        <div id="web-page" style="display: inline-grid; grid-template-columns: 1fr 1fr">
            <div id="game_area" style="display: inline-grid; grid-template-columns: auto auto auto auto auto auto auto">  
                <?php
                    //Create Game Area
                    for($i = 0; $i < 6; $i++)
                    {
                        for($j = 0; $j < 7; $j++)
                        {   
                            echo "<div id= '$i.$j'><img src= '";
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
                <input type="button" value="Return to Lobby" onclick="location.href = 'http://www.google.com'">
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
                        //write messagebox invalid turn
                    }
                }
            }

            //Check, if database was updated
            //while()
        ?>
    </body>

    
</html>

