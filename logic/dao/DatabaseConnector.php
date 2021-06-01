<?php

abstract class DatabaseConnector {
    private string $host = "localhost";
    private string $username = "dbuser";
    private string $password = "123";
    private string $database = "website_unijui";

    public function getConection(): \mysqli {
        return new mysqli(
            $this->host, 
            $this->username, 
            $this->password, 
            $this->database
        );
    }
}

?>