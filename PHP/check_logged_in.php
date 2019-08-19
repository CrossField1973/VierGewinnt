<?php
    require "db_connection.php";

    if(isset($_COOKIE["token"]))
    {
        $token = $_COOKIE["token"];
    }

    else
    {
        header("Location: http://example.com/error.php");
        die();
    }

    $sql = "SELECT securitytoken FROM user_table";
    $result = $conn->query($sql);
    $is_logged_in = false;

    if($result->num_rows > 0)
    {
        for($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            if($row["securitytoken"] == $token)
            {
                $is_logged_in = true;
            }
        }
    }

    if($is_logged_in == false)
    {
        header("Location: http://example.com/error.php");
        die();
    }
?>