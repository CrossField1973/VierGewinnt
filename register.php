<?php
$email = filter_input(INPUT_POST, 'email');
$pw = filter_input(INPUT_POST, 'pw');
$nickname = filter_input(INPUT_POST, 'nickname');
$fname = filter_input(INPUT_POST, 'fname');
$name = filter_input(INPUT_POST, 'name');
$age = filter_input(INPUT_POST, 'age');
$gender = filter_input(INPUT_POST, 'radio');
$pwhash = password_hash($pw, PASSWORD_DEFAULT);

echo $email;
echo $pw;
echo $nickname;


    $sqlhost = "localhost";
    $sqluser = "root";
    $sqlpass = "";
    $dbname  = "user_table";

    $my_db = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die ("DB-system nicht verfuegbar");

    if (mysqli_connect_error()) {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email From user_table Where email = ? Limit 1";
        $INSERT = "INSERT Into user_table (name, first_name, nickname, email, password, age, sex) values(?, ?, ?, ?, ?, ?, ?)";


        $stmt = $my_db->prepare($SELECT);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        echo $rnum;

        if ($rnum==0) {
            $stmt->close();

            if ($stmt = $my_db->prepare($INSERT)){
            $stmt->bind_param('sssssis', $name, $fname, $nickname, $email, $pwhash, $age, $gender);
            $stmt->execute();
            echo "New record inserted successfully";
            echo $pwhash;

            $stmt->close();
            $my_db->close();
            } else {
                echo "FAIL";
            }
        }
        else{
            echo "Someone already registered with this Email";
        }
    }

