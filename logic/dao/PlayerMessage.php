<?php

include SERVER_ROOT."/logic/dao/DatabaseConnector.php";

class PlayerMessage extends DatabaseConnector {
    public function __construct(
        private string $name,
        private string $email,
        private string $message
    ) { 
        if (empty($name) || empty($email) || empty($message)) {
            exit();
        }
     }

     public function send() {
        $sql = "INSERT INTO player_messages(player_messages.name, player_messages.email, player_messages.message)
        VALUES ('{$this->name}', '{$this->email}', '{$this->message}');";
        echo $sql;
     }
}


?>