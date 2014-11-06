<?php
    // require database file in the model folder
    require_once(__DIR__ . "/../model/database.php");
    
    $connection = new mysqli($host, $username, $password);
    
    if($connection->connect_error){
       die("<p>Error: " . $connection->connect_error . "</p>"); 
    }
   
    $exists = $connection->select_db($database);
    
    if (!$exists) {
        // create a database query
         $query = $connection->query("CREATE DATABASE $database");
        
        if ($query){
          echo "<p>Successfully created database: " . $database . "</p>";
        }
     }
     else {
         echo "<p>Database already exists</p>";
     }
     
     //create a table query
     //create a table to store information call post     
     $query = $connection->query("CREATE TABLE posts ("
             . "id int(11) NOT NULL AUTO_INCREMENT,"
             . "title varchar(255) NOT NULL,"
             . "post text NOT NULL,"
             . "PRIMARY KEY (id))");
     
     // boolean value true or false
     if ($query){
         // table post already exist
         echo "<p>Successfully created table: posts</p>";
     }
     else {
         echo "<p>$connection->error</p>";
     }
    
   
   $connection->close();
