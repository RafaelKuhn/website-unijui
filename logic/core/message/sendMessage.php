<?php
    $any_post = $_POST["name"] ?? $_POST["email"] ?? $_POST["message"] ?? null;
    if (is_null($any_post)) {
        return;
    }
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $msg = new PlayerMessages();
    $msg->send($name, $email, $message);
?>