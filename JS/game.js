
function register_turn(index)
{
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "../PHP/game_register_turn.php?turn=" + index, true);
    xhttp.send();
}

function load_game_area()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            document.getElementById("game_area").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../PHP/game_area.php", true);
    xhttp.send();
}

function load_current_turn()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            document.getElementById("current_turn").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../PHP/game_current_turn.php", true);
    xhttp.send();
}

function check_for_winner()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            if(this.responseText.trim() != "false")
            {
                if(this.responseText.trim() == getCookie("token"))
                {
                    document.getElementById("current_turn").innerHTML = "<h1>You win!</h1>";
                    setTimeout(function() 
                                    {
                                        xhttp.open("GET", "../PHP/game_delete_instance.php", true);
                                        xhttp.send();
                                        window.location.href = "lobby.php";
                                    }, 
                                3000);
                }

                else
                {
                    document.getElementById("current_turn").innerHTML = this.responseText.trim()
                    document.getElementById("current_turn").innerHTML = "<h1>You lose!</h1>";
                    setTimeout(function() 
                                    {   
                                        window.location.href = "lobby.php";
                                    }, 
                                3000);
                }
            }
            
            else
            {
                load_current_turn();
            }
            
        }
    };
    xhttp.open("GET", "../PHP/game_has_winner.php", true);
    xhttp.send();
    
}

function getCookie(cname) 
{
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

function interval()
{
    load_game_area();
    check_for_winner();
}