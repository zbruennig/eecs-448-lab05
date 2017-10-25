<?php
  echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
  integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous" />';

  $author = $_POST["author"];
  $content = $_POST["content"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "zbruennig", "P@\$\$word123", "zbruennig");
  if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $errors = FALSE;

  if($author == ""){
    echo("Error: Author cannot be empty.<br>");
    $errors = TRUE;
  }
  if($content == ""){
    echo("Error: Comment cannot be blank.<br>");
    $errors = TRUE;
  }
  if($errors == TRUE){
    exit();
  }

  //foreign key isn't working properly on eecs servers currently, I think?
  //this is the workaround
  $authorFound = FALSE;

  $nameQuery = "SELECT user_id FROM Users WHERE user_id='$author'";
  if($result = $mysqli->query($nameQuery)) {
    while ($row = $result->fetch_assoc()) {
        $authorFound = TRUE;
        // printf ("%s (%s)\n", $row["Name"], $row["user_id"]);
    }
  }

  if(!$authorFound){
    echo("Error: User \"" . $author . "\" cannot be found");
    exit();
  }

  $query = "INSERT INTO Posts (content, author_id) VALUES('$content','$author')";
  if($mysqli->query($query) == TRUE) {
    echo("Comment successfully added!");
  }
  else {
    echo("Error: User \"" . $author . "\" cannot be found");
  }

 ?>
