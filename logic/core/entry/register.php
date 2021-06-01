<?php
    $any_post = $_POST["username"] ?? $_POST["email"] ?? $_POST["password"] ?? null;
    if (is_null($any_post)) {
        return;
    }

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $request = new RegisterRequest();
    $request->register($email,$username,$password);
?>