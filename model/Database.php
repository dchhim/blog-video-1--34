<?php

class Database {

    // create class call Database
    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;
    public $error;

    //constructor builds the object
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connection = new mysqli($host, $username, $password);

        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }

        $exists = $this->connection->select_db($database);

        if (!$exists) {
            // create a database query
            $query = $this->connection->query("CREATE DATABASE $database");

            if ($query) {
                echo "<p>Successfully created database: " . $database . "</p>";
            }
        } else {
            echo "<p>Database already exists</p>";
        }
    }

    //open a connection function
    public function openConnection() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }
    }

    public function closeConnection() {
        // check to see if the information is available
        if (isset($this->connection)) {
            $this->connection->close();
        }
    }

    // this function pass in a string
    public function query($string) {
        $this->openConnection();

        $query = $this->connection->query($string);
        
        if (!$query){
            $this->error = $this->connection->error;
        }

        $this->closeConnection();

        return $query;
    }

}
