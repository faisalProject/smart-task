<?php

    class Database 
    {
        public $hostname,
                  $username,
                  $password,
                  $database;

        public function __construct($hostname, $username, $password, $database)
        {
            $this->hostname = $hostname;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        // Fungsi abstract
        public function connect()
        {
            return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        }
    }

?>