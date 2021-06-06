<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php";
    include SERVER_ROOT."/logic/dao/LoginRequester.php";

    $email = $_POST["email"] ?? exit("bad request");
    $password = $_POST["password"] ?? exit("bad request");

    $request = new LoginRequester();
    $loginResult = $request->login($email, $password);

    if($loginResult == false) { 
        echo("<script>
        alert('Login ou senha inválidos'); 
        window.history.back();
        </script>");
        return;
    }
    
    $user_data = $loginResult;
    
    session_start();
    $_SESSION["id"] = $user_data["id"];
    $_SESSION["username"] = $user_data["username"];
  
    $index_address = SERVER_ROOT_REQUEST;
    header("Location: {$index_address}"); 
?>