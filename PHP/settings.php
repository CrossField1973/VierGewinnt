<html>

<head>
  <title>Viergewinnt Settings</title>
  <link rel="stylesheet" href="../CSS/register.css">
</head>

<body>
  <form action="../PHP/settings.php" method="post">
    <div class="register-box">
      <h1>Settings</h1>
      <div class="textbox">
        <input type="email" placeholder="Email" name="email" value="" required readonly>
      </div>
      <div class="textbox">
        <input type="password" placeholder="Password *" name="pw" value="" required>
      </div>
      <div class="textbox">
        <input type="text" placeholder="Nickname" name="nickname" value="" required>
      </div>

      <div class="textbox">
        <input type="text" placeholder="Firstname" name="fname" value="" readonly>
      </div>
      <div class="textbox">
        <input type="text" placeholder="Name" name="name" value="" readonly>
      </div>
      <div class="textbox">
        <input type="number" placeholder="Age" name="age" value="" min="18" max="100">
      </div>
      <div>
        <label class="container">No information
          <input type="radio" checked="checked" name="radio" value="def">
          <span class="checkmark"></span>
        </label>
        <label class="container">Male
          <input type="radio" name="radio" value="male">
          <span class="checkmark"></span>
        </label>
        <label class="container">Female
          <input type="radio" name="radio" value="female">
          <span class="checkmark"></span>
        </label>
      </div>
      <input class="btn" type="submit" name="submit" value="Update">
  </form>
  <a href="../PHP/lobby.php">
    <input class="btn" type="button" name="" value="Back">
  </a>
  </div>
</body>

</html>