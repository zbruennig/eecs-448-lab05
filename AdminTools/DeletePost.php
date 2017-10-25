<?php
  echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
  integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous" />';

  $mysqli = new mysqli("mysql.eecs.ku.edu", "zbruennig", "P@\$\$word123", "zbruennig");
  if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $sel_query = "SELECT post_id FROM Posts";
  $results = $mysqli->query($sel_query);

  while($row = $results->fetch_assoc()){
    $post_id = $row["post_id"];
    $status = $_POST[$post_id];
    //will be empty if button is not clicked, 'on' if it is
    if($status == "on"){
      $del_query = "DELETE FROM Posts WHERE post_id=" . $post_id;
      $mysqli->query($del_query);
      echo("Post with ID #" . $post_id . " successfully deleted.<br>");
    }
  }
 ?>
