<?php
$email = filter_input(INPUT_POST, 'email');
$pw = filter_input(INPUT_POST, 'pw');
$nickname = filter_input(INPUT_POST, 'nickname');
$fname = filter_input(INPUT_POST, 'fname');
$name = filter_input(INPUT_POST, 'name');
$age = filter_input(INPUT_POST, 'age');
$gender = filter_input(INPUT_POST, 'radio');
$pwhash = password_hash($pw, PASSWORD_DEFAULT);

function random_string() {
    if(function_exists('random_bytes')) {
       $bytes = random_bytes(16);
       $str = bin2hex($bytes); 
    } else if(function_exists('openssl_random_pseudo_bytes')) {
       $bytes = openssl_random_pseudo_bytes(16);
       $str = bin2hex($bytes); 
    } else if(function_exists('mcrypt_create_iv')) {
       $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
       $str = bin2hex($bytes); 
    } else {
       $str = md5(uniqid('viergewinntgewinntwenn4', true));
    }   
    return $str;
 }


    $sqlhost = "localhost";
    $sqluser = "root";
    $sqlpass = "";
    $dbname  = "user_table";

    $my_db = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die ("DB-system nicht verfuegbar");

    if (mysqli_connect_error()) {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        //"UPDATE MyGuests SET lastname='Doe' WHERE id=2"
        $UPDATE = "UPDATE user_table SET password='".$pwhash."', nickname =  WHERE id='".$id."'";

        // name, first_name, nickname, email, password, age, sex, identifier, securitytoken
        $securitytoken = random_string();
        $identifier = random_string();


        $READ = "SELECT name FROM user_table WHERE securitytoken='".$token."'";
        $result = mysqli_query($my_db, $READ);
          
        $row = $result->fetch_assoc();
        $id = $row['id'];


        
          if ($stmt = $my_db->prepare($UPDATE)){
            $stmt->bind_param('sssssisss', $name, $fname, $nickname, $email, $pwhash, $age, $gender, $identifier, $securitytoken);
            $stmt->execute();
            echo "New record inserted successfully";
            echo $pwhash;

            setcookie("token", $securitytoken, time() + (86400 * 30), "/");

            $stmt->close();
            $my_db->close();
          
          } else {
                echo "FAIL";
          }
            
          header("Location: ../PHP/lobby.php");
        
        }
?>  

