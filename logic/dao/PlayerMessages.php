<?php

include SERVER_ROOT."/logic/dao/DatabaseConnector.php";

class PlayerMessages extends DatabaseConnector {
    public function __construct() { }
    
    function send(string $name, string $email, string $message): bool {
        $sql = "INSERT INTO player_messages(player_messages.name, player_messages.email, player_messages.message)
        VALUES (?, ?, ?)";
        $con = $this->getConection();

        $statement = $con->prepare($sql);
        $statement->bind_param("sss", $name, $email, $message);
        $isSuccessful = $statement->execute();
        
        return $isSuccessful;
    }

    function load(): array {
        $messages = array();

        $con = $this->getConection();
        $res = $con -> query ("SELECT player_messages.name, player_messages.email,
        player_messages.message FROM player_messages");
        
        if (!$res) {
            return $messages;
        }

        for ($i = 0; $i < $res->num_rows; $i++) {
            $assoc = $res->fetch_assoc();
            array_push($messages, $assoc);
        }

        return $messages;
    }
    
    
}


?>