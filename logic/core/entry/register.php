<?php

    include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php";
    include SERVER_ROOT."/logic/dao/RegisterRequester.php";

    $username = $_POST["username"] ?? exit("bad request");
    $email = $_POST["email"] ?? exit("bad request");
    $password = $_POST["password"] ?? exit("bad request");

    $request = new RegisterRequester();
    $registerResult = array();

    try {
        $registerResult = $request->register($email,$username,$password);
    } catch (Exception $ex) {
        echo("<script>
        alert(\"Erro: ".$ex->getMessage()."\"); 
        window.history.back();
        </script>");

        exit;
    }


    session_start();
    $_SESSION["id"] = $registerResult["id"];
    $_SESSION["username"] = $registerResult["username"];

    $menu_path = SERVER_ROOT_REQUEST;

    echo("<script type='text/javascript'>
    alert('Registro feito com sucesso'); 
    window.location.href='{$menu_path}';
    </script>");
?>