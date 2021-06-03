<?php

include SERVER_ROOT . "/logic/dao/DatabaseConnector.php";

class RegisterRequester extends DatabaseConnector
{
    public function __construct()
    {
    }

    public function register(string $email, string $username, string $password)
    {
        $encrypted_passw = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (email, nickname, `password`) 
            VALUES ( ?, ?, ?);";
        $con = $this->getConection();

        $statement = $con->prepare($sql);
        $statement->bind_param("sss", $email, $username, $encrypted_passw);

        $success = $statement->execute();

       return $success;
    }
}
