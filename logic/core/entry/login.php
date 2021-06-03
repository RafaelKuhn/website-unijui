<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php";
    include SERVER_ROOT."/logic/dao/LoginRequester.php";

    $email = $_POST["email"] ?? exit("bad request");
    $password = $_POST["password"] ?? exit("bad request");

    $request = new LoginRequester();
    $loginSucceeded = $request->login($email, $password);

    if($loginSucceeded == false) { 
        echo("<script>
        alert('Login ou senha inválidos'); 
        window.history.back();
        </script>");
    }
    
    //save session and stuff
    header(SERVER_ROOT."/index.php"); 
?>