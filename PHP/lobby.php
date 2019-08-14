<html>
    <head>
        <title>Lobby</title>
        <link rel="stylesheet" href="../CSS/lobby.css">
        </head>
        <body>
		<script>
		function addAChild () {
		  var myBox = document.createElement('div');
		  myBox.setAttribute("class","game1");
		  var myBox2 = document.createElement('div');
		  var myIdText = document.createTextNode('Game 1')
		  myBox2.setAttribute("class","gameid");
		  myBox2.appendChild(myIdText);
		  myBox.appendChild(myBox2);
		  var myBtn = document.createElement('button');
		  myBtn.setAttribute("type","button");
		  myBtn.setAttribute("class","joinbtn");
		  var myBtnText = document.createTextNode('JOIN');
		  myBtn.appendChild(myBtnText);
		  var myCre = document.createElement('div');
		  myCre.setAttribute("class","creator");
		  var myText = document.createTextNode('Erstellt von *User*');
		  myCre.appendChild(myText);
		  
		  var Ausgabebereich = document.getElementsByClassName('lobby-box');
		  var add = document.getElementById('add');
			Ausgabebereich[0].insertBefore(myBox, add);
			myBox.appendChild(myBtn);
			myBox.appendChild(myCre);
		}
		
		function logout() {
			alert("Logout successfully!");
		}
		</script>
			<div class="dashboard">
				<div class="logo">VierGewinnt</div>
				<a href="../HTML/login.html"><button type="button" class="logoutbtn" onclick="logout()">Logout</button></a>
				<a href="../PHP/settings.php"><button type="button" class="sbtn">Settings</button></a>
				<a href="lobby.html"><button type="button" class="homebtn">Home</button></a>
			</div>
            <div class="lobby-box">
			
                <h1 class="titel">Lobby</h1>
				<div class="welbox">
					Welcome back 

					<?php 


        			$token = $_COOKIE["token"];

        			$sqlhost = "localhost";
        			$sqluser = "root";
        			$sqlpass = "";
        			$dbname  = "user_table";

        			$my_db = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die ("DB-system nicht verfuegbar");

        			if (mysqli_connect_error()) {
          				die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        			} else {

          			$READ = "SELECT first_name FROM user_table WHERE securitytoken='".$token."'";
          			$result = mysqli_query($my_db, $READ);
          
          			$row = $result->fetch_assoc();
          			echo $row['first_name'];
        
        			}

        			?>


				</div>
        
				<div class="gameadd" id="add">				
					<button type="button" class="addbtn" onclick="addAChild()">+</button>
				</div>
            </div>
        </body>
</html>
