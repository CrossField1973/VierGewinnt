<?php
    require('db_connection.php');     
    $token = $_COOKIE["token"];     
 
    $sql = "SELECT state_of_game, turn, player1, player2 FROM games WHERE player1 = '".$token."' OR player2 = '".$token."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

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

