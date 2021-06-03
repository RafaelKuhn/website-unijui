<?php

include SERVER_ROOT . "/logic/dao/DatabaseConnector.php";

class RegisterRequester extends DatabaseConnector {
    public function register(string $email, string $username, string $password) {
        $encrypted_passw = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (email, nickname, `password`) 
            VALUES ( ?, ?, ?);";
        $con = $this->getConection();

        $statement = $con->prepare($sql);
        $statement->bind_param("sss", $email, $username, $encrypted_passw);
        $statement->execute();

        $affected_rows = $con->affected_rows;

        echo $affected_rows == 1;
    }
}
