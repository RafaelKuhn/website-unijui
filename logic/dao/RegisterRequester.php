<?php

include SERVER_ROOT . "/logic/dao/DatabaseConnector.php";

class RegisterRequester extends DatabaseConnector {
    public function register(string $email, string $username, string $password): array {
        $encrypted_passw = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (email, nickname, `password`) 
            VALUES ( ?, ?, ?);";
        $con = $this->getConection();

        $statement = $con->prepare($sql);
        $statement->bind_param("sss", $email, $username, $encrypted_passw);

        $statement->execute();

        if($statement->errno == 1062){
            throw new Exception(message: "Nome de usuário ou Email já cadastrados");
        }
        
        $user_data = array();
        $user_data["id"] = $statement->insert_id;
        $user_data["username"] = $username;

        return $user_data;
    }
}
