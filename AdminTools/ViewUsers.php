<?php
  echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
  integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous" />';

  $mysqli = new mysqli("mysql.eecs.ku.edu", "zbruennig", "P@\$\$word123", "zbruennig");
  if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $query = "SELECT user_id FROM Users";
  $results = $mysqli->query($query);

  if($results->num_rows == 0) {
    echo "Error: No users are stored.";
    exit();
  }

  echo "<h4>Users:</h4>";
  echo "<table>";
  while($row = $results->fetch_assoc()) {
    echo "<tr><td>" . $row["user_id"] . "</tr></td>";
  }
  echo "</table>";

  //still don't know what this does
  $results->free();

?>
