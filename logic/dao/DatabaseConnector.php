<?php

abstract class DatabaseConnector {
    private string $host = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $database = "website_unijui";

    private ?\mysqli $connection = null;

    public function getConection()
    {
        if (is_null($this->connection)) {
            $this->connect();
        }

        return $this->connection;
    }

    private function connect()
    {
        $this->connection = new mysqli(
            $this->host, 
            $this->username, 
            $this->password, 
            $this->database
        );
    }
}

?>