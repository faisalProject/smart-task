<?php

    date_default_timezone_set("Asia/Jakarta");

    // Abstract class Parent
    abstract class Database 
    {
        protected $hostname,
                  $username,
                  $password,
                  $database;

        protected function __construct($hostname, $username, $password, $database)
        {
            $this->hostname = $hostname;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        // Fungsi abstract
        abstract protected function connect();
    }

?>