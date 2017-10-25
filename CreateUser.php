<?php
  echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
  integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous" />';

  $username = $_POST["user"];
  //Connect to db
  $mysqli = new mysqli("mysql.eecs.ku.edu", "zbruennig", "P@\$\$word123", "zbruennig");
  if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
  }

  if($username == ""){
    echo("Error: User Name cannot be empty.");
    exit();
  }

  $query = "INSERT INTO Users(user_id) VALUES('$username')";
  if($mysqli->query($query) == TRUE) {
    echo($username . " created succesfully!");
  }
  else {
    echo("Error: \"" . $username . "\" is already in use.");
  }
?>
