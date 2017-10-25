<?php

  echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
  integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous" />';

  $user = $_POST["user"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "zbruennig", "P@\$\$word123", "zbruennig");
  if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
  }

  if($user == ""){
    //should only reach here if drop down list is empty
    echo("Error: There are no users registered. Why not register yourself?");
    exit();
  }

  $query = "SELECT content from Posts WHERE author_id = '$user'";
  $results = $mysqli->query($query);

  if($results->num_rows == 0){
    echo("No posts found!");
    exit();
  }

  echo("<h4>Posts:</h4>");
  echo("<table>");
  while($row = $results->fetch_assoc()) {
    $post = $row["content"];
    echo("<tr><td>" . $post . "</tr></td>");
  }
  echo("</table>");
 ?>
