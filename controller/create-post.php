<?php
    // require database file
    require_once(__DIR__ . "/../model/config.php");
    
        
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $post  = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
    
  
    // create or a run a query
    $query = $connection->query("INSERT INTO posts SET title = '$title', post = '$post'");
   
   
    if($query){
        // if success it output with a title
        echo "<p>Successfully inserting post: $title</p>";
    }
    else {
        // if not successful display an error
        echo "<p>$connection->error</p>";
   }
    