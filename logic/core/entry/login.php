<?php 
    $any_post = $_POST["email"] ?? $_POST["password"] ?? null;
    if (is_null($any_post)) {
        return;
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    $request = new LoginRequester();
    $request->login($email, $password);
?>