<?php
    // require database file
    require_once(__DIR__ . "/../model/database.php");
    
    // able to create connection using mysqli object
    // all these parameters are in the database.php
    $connection = new mysqli($host, $username, $password, $database);

    // different from the other post(blog post)
    // this POST means that we're sending information/data or recive info
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $post  = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
    
    // run query to insert things into the table
    // sql command starts off with an action/verb
    $query = $connection->query("INSERT INTO posts SET title = '$title', post = '$post'");
    // use conditional statement to see if it's true or false
    // to see we are successful in inserting information into the database
    if($query){
        // if success it output with a title
        echo "<p>Successfully inserting post: $title</p>";
    }
    else {
        // if not successful display an error
        echo "<p>$connection->error</p>";
   }
    
    // run query on the connection and close our connection
    $connection->close();