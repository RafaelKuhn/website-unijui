<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php";
    include SERVER_ROOT."/logic/dao/RegisterRequester.php";

    $username = $_POST["username"] ?? exit("bad request");
    $email = $_POST["email"] ?? exit("bad request");
    $password = $_POST["password"] ?? exit("bad request");

    $request = new RegisterRequester();
    $registerSucceeded = $request->register($email,$username,$password);

    if($registerSucceeded) {
        //criar session aqui

        $menu_path = SERVER_ROOT_REQUEST;

        echo("<script type='text/javascript'>
        alert('Registro feito com sucesso'); 
        window.location.href='{$menu_path}';
        </script>");
    }
?>