<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_table";


$email = filter_input(INPUT_POST, 'email');
$pw = filter_input(INPUT_POST, 'pw');
$nickname = filter_input(INPUT_POST, 'nickname');
$fname = filter_input(INPUT_POST, 'fname');
$name = filter_input(INPUT_POST, 'name');
$age = filter_input(INPUT_POST, 'age');
$gender = filter_input(INPUT_POST, 'radio');
$pwhash = password_hash($pw, PASSWORD_DEFAULT);


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM user_table where nickname='" .$nickname. "' OR email= '" .$email. "'";
$result = mysqli_query($conn, $query);

// Check for duplicates in nickname or email adress
if(mysqli_num_rows($result) > 0){
        
    echo "A record already exists."; 
    exit;
}

// Insert in database
else {
    $sql = "INSERT INTO user_table (name, first_name, nickname, email, password, age, sex) VALUES ('$name', '$fname', '$nickname', '$email', '$pw', $age, '$gender')";
}

// Feedback
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


// Close connection
mysqli_close($conn);

?>